<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Comments Controller
 *
 * @property \App\Model\Table\CommentsTable $Comments
 *
 * @method \App\Model\Entity\Comment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CommentsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->set('loginname', $this->Auth->user('email'));
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');

        // add および tags アクションは、常にログインしているユーザーに許可されます。
        if (in_array($action, ['add', 'tags', 'index', 'view'])) {
            return true;
        }

        // コメントが現在のユーザーに属していることを確認します。
        $id = $this->request->getParam('pass.0');
        $comment = $this->Comments->get($id, ['contain' => [],]);
        $this->loadModel('Articles');
        $article = $this->Articles->get($comment->article_id);
        $this->loadModel('Users');
        $user = $this->Users->get($article->user_id);
        if (in_array($action, ['edit', 'delete']) && $comment->contributor === $this->Auth->user('email')) {
            return true;
        }
        if (in_array($action, ['edit', 'delete']) && $this->Auth->user('email') === $user->email) {
            return true;
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Articles'],
        ];
        $comments = $this->paginate($this->Comments);

        $this->set(compact('comments'));
    }

    /**
     * View method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $comment = $this->Comments->get($id, [
            'contain' => ['Articles'],
        ]);

        $this->set('comment', $comment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($article_id = null)
    {
        //debug($article_id);
        $this->loadModel('Articles');
        $article = $this->Articles->get($article_id);
        $slug = $article->slug;
        $this->set('target', $article_id);
        $comment = $this->Comments->newEntity();
        if ($this->request->is('post')) {
            $comment = $this->Comments->patchEntity($comment, $this->request->getData());
            $comment->contributor = $this->Auth->user('email');
            if ($this->Comments->save($comment)) {
                $this->Flash->success(__('The comment has been saved.'));
               
                return $this->redirect(['controller' => 'Articles', 'action' => 'view', $slug]);
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        }
        $articles = $this->Comments->Articles->find('list', ['limit' => 200]);
        $this->set(compact('comment', 'articles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {   
        //debug($this->request);
        //debug($id);
        $comment = $this->Comments->get($id, [
            'contain' => [],
        ]);
        //debug($comment->contributor);
        //debug($this->Auth->user('email'));     
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comment = $this->Comments->patchEntity($comment, $this->request->getData());
            if ($this->Comments->save($comment)) {
                $this->Flash->success(__('The comment has been saved.'));
                $article = $this->Comments->Articles->get($comment->article_id);
                return $this->redirect(['controller' => 'Articles', 'action' => 'view',$article->slug]);
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        }
        $articles = $this->Comments->Articles->find('list', ['limit' => 200]);
        $this->set(compact('comment', 'articles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Comment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comment = $this->Comments->get($id);
        if ($this->Comments->delete($comment)) {
            $this->Flash->success(__('The comment has been deleted.'));
        } else {
            $this->Flash->error(__('The comment could not be deleted. Please, try again.'));
        }
        $article = $this->Comments->Articles->get($comment->article_id);
        return $this->redirect(['controller' => 'Articles', 'action' => 'view',$article->slug]);
        //return $this->redirect(['action' => 'index']);
    }
}
