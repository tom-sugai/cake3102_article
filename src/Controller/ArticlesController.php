<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
// add for collection class
use Cake\Collection\Collection;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 *
 * @method \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['index', 'view','tags', 'data']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        // add および tags アクションは、常にログインしているユーザーに許可されます。
        if (in_array($action, ['add', 'tags'])) {
            return true;
        }

        // 他のすべてのアクションにはスラッグが必要です。
        $slug = $this->request->getParam('pass.0');
        if (!$slug) {
            return false;
        }

        // 記事が現在のユーザーに属していることを確認します。
        $article = $this->Articles->findBySlug($slug)->first();

        return $article->user_id === $user['id'];
    }

    public function top()
    {
        $this ->autoLayout = true;
        $this->autoRender = true;
        $this->viewBuilder()->setLayout('articleLayout-1');

        //$this->Flash->set('---- Flash test from /fumiko4() ----');
        //$this->set('msg',"fumichan !!");

        $headertext = "headertext : Articles Application";
        $this->set('headertext',$headertext);
        $footertext = "footertext : end Articles Application";
        $this->set('footertext', $footertext);
        
        $this->paginate = [
            'contain' => ['Users','Tags', 'Comments'],
            'limit' => 6,
            'order' => ['Articles.id' => 'desc']
        ];

        $articles = $this->paginate($this->Articles);
        $this->set(compact('articles'));
        $this->set('loginname', $this->Auth->user('email'));

    }

    public function data()
    {
        $this->paginate = [
            'contain' => ['Users', 'Comments'],
            'limit' => 50,
            'order' => ['Articles.id' => 'desc']
        ];

        $articles = $this->paginate($this->Articles);
         
        // for data view
        $this->set(compact('articles'));
        $this->set('_serialize', ['articles']);
        
        /** 
        // for html view
        $this->set(compact('articles'));
        $this->set('Comments', $this->loadModel('Comments'));
        */
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Comments'],
            'limit' => 5,
            'order' => ['Articles.id' => 'desc']
        ];

        $articles = $this->paginate($this->Articles);
        /** 
        // for data view
        $this->set(compact('articles'));
        $this->set('_serialize', ['articles']);
        */
        
        // for html view
        $this->set(compact('articles'));
        $this->set('Comments', $this->loadModel('Comments'));
        
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {
        $article = $this->Articles->findBySlug($slug)->contain(['Users','Tags','Comments' => ['sort' => ['Comments.id' => 'DESC']]])->firstOrFail();
        //debug($article);
        $this->set('article', $article);
        $this->loadModel('Comments');
        $commentNumber = $this->Comments
        	->find()
        	->where(['article_id =' => $article->id])
        	->count();
        //debug($commentNumber);
        $this->set('comNumber',$commentNumber);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //$this ->autoLayout = true;
        $this->viewBuilder()->enableAutoLayout();
        $this->autoRender = true;

        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            // 変更: セッションから user_id をセット
            $article->user_id = $this->Auth->user('id');
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        
        $users = $this->Articles->Users->find('list', ['limit' => 200]);
        $tags = $this->Articles->Tags->find('list', ['limit' => 200]);
        $this->set(compact('article', 'users', 'tags'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($slug = null)
    {
        // load article 
        $article = $this->Articles->findBySlug($slug)->contain('Tags')->firstOrFail();
        // save process
        if ($this->request->is(['post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->getData(),[
                // 追加: user_id の更新を無効化
                'accessibleFields' => ['user_id' => false]   
            ]);
            
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('edit : The article has been saved.'));
                return $this->redirect(['action' => 'index']);

            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }

        $users = $this->Articles->Users->find('list', ['limit' => 200]);
        $tags = $this->Articles->Tags->find('list', ['limit' => 200]);
        //debug($tags);
        $this->set(compact('article', 'users', 'tags'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($slug = null)
    {
        
        $article = $this->Articles->findBySlug($slug)->firstOrFail();
        $id = $article->id;
    
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function tags()
    {
        $tags = $this->request->getParam('pass');
        //debug($tags);
        $articles =$this->Articles->find('tagged', ['tags' => $tags]);

        $this->set([
            'articles' => $articles,
            'tags' => $tags
        ]);
    }
}