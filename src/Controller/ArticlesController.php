<?php
namespace App\Controller;

use App\Controller\AppController;
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

    /**  inspect the php program */
    public function inspect ($id = null) {
        $this ->autoLayout = true;
        $this->autoRender = false;

        //--------function buildTags---------------------
        function buildTags($table,$tagString)
        {
            //debug($tagString);
            // タグをトリミング
            $newTags = array_map('trim', explode(',', $tagString));
            //debug($newTags);
            // 全ての空のタグを削除
            $newTags = array_filter($newTags);
            //debug($newTags);
            // 重複するタグの削減
            $newTags = array_unique($newTags);
            //debug($newTags);
            $out = [];
            $query = $table->Tags->find()
                ->where(['Tags.title IN' => $newTags]);
            // 新しいタグのリストから既存のタグを削除。
            foreach ($query->extract('title') as $existing) {
                $index = array_search($existing, $newTags);
                if ($index !== false) {
                    unset($newTags[$index]);
                }
            }
            //debug($query->toArray());
            // 既存のタグを追加。
            foreach ($query as $tag) {
                $out[] = $tag;
            }
            //debug($out);
            // 新しいタグを追加。
            foreach ($newTags as $tag) {
                $out[] = $table->Tags->newEntity(['title' => $tag]);
            }
            return $out;
        }
        
        echo "-------- inspect main start-----------" . "<br/>";
        // make variable $articles : table object
        $articles = $this->Articles;
        // $article : entity object contain Users,Tags,Comments tables
        echo "-------- load article by article->id (articles/inspect/id)" . "<br/>";
        $article = $this->Articles->get($id, [
            'contain' => ['Users', 'Tags', 'Comments'],
        ]);
        echo "article id : " . $article->id . "<br/>";
        //
        /**
        echo "-------- confirm article->tags data" . "<br/>"; 
        foreach ($article->tags as $tag){
            echo "tag->title : " . $tag->title . "<br/>";   
        }
        echo "article->tag_string : " . $article->tag_string . "<br/>";
        echo "------- make tags collection from article->tags" . "<br/>";
        $tags = new Collection($article->tags);
        //debug($tags);
        echo "------- eache tag in this object " . "<br/>";
        foreach ($tags as $tag){
            echo "tag : " . $tag->title . "<br/>";
        }
        //
        echo "------- make tag list separated by ',' " . "<br/>";
        $str = $tags->reduce(function ($string, $tag){
            return $string . $tag->title . ', ';
        }, '');
        echo "tag list : " . $str . "<br/>";
        //
        echo "------- add new tag('sam' and 'tony' and tom) " . "<br/>";
        $new_str_1 = $str . "sam" . ", " . " tony" .  ", " . " fumiko";
        echo "new_str_1 : " . $new_str_1 . "<br/>";
        //------------ create new tags object -----------------------------
        echo "------ check for article->tag_string" . "<br/>";
        echo "article->tag_string : " . $article->tag_string . "<br/>";
        echo "------- create new article->tags by buildTags()" . "<br/>";
        $article->tags = buildTags($articles,$new_str_1);
        //
        echo "** confirm article->tags object **" . "<br/>";
        //debug($article->tags);
        echo "-------- check for article->tags" . "<br/>"; 
        foreach ($article->tags as $tag){
            echo "tag->title : " . $tag->title . "<br/>";   
        }
        // load test data
        $article->tag_string = 'fumiko,tom,junji';
        // save article
        if ($this->Articles->save($article)) {
            echo "------ The article has been saved." . "<br/>";
        } else {
            echo "The article could not be saved. Please, try again." . "<br/>";
        }
        //debug($article);
        */

        echo "function test for Article->_getTagString" ."<br/>";
        // make variable $articles : table object
        $articles = $this->Articles;
        // $article : entity object contain Users,Tags,Comments tables
        echo "-------- load article by article->id (articles/inspect/id)" . "<br/>";
        $article = $this->Articles->get($id, [
            'contain' => ['Users', 'Tags', 'Comments'],
        ]);
        echo "article id : " . $article->id . "<br/>";
        $article->tag_string = "fumiko";
        echo "isset article->tag_string : " . $article->tag_string . "<br/>";
        //
        if (isset($article->_properties['tag_string'])){
            echo "article->_properties['tag_string'] : " . $article->tag_string . "<br/>";
        } else {
            echo "don't propertied tag_string" . "<br/>";
        }
        //
        if (!empty($article->tags)){
            $tags = new Collection($article->tags);
            //debug($tags);
            $str = $tags->reduce(function ($string, $tag){
                    echo "3333 : " . $string . "<br/>";
                    return $string . $tag->title . ', ';
                }, '');
            echo "4444 : " . $str . "<br/>";
            echo "********* end of inspect method  ***********";
        } else {
            echo "article->tags is empty !! ";
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
            'contain' => ['Users'],
            'limit' => 10,
            'order' => ['Articles.id' => 'desc']
        ];

        $articles = $this->paginate($this->Articles);

        $this->set(compact('articles'));
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
        $article = $this->Articles->findBySlug($slug)->contain(['Users','Tags','Comments'])->firstOrFail();
        $this->set('article', $article);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this ->autoLayout = true;
        $this->autoRender = true;

        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            $this->Flash->success($article->tag_string);

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
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            
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