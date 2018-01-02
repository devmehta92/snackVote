<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Hash;
/**
 * Votes Controller
 *
 * @property \App\Model\Table\VotesTable $Votes
 *
 * @method \App\Model\Entity\Vote[] paginate($object = null, array $settings = [])
 */
class VotesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

     //User dashboard page
    public function index()
    {
        //Find all fruits from the table to be populated in the view
        $this->loadModel('Fruits');
        $snacks = $this->Fruits->find('all');
        $this->set(compact('snacks'));
        $uid = $this->Auth->User('id');

        //Find last voted fruit name by current user
        $fruitName = $this->Votes->find('all');
          $fruitName->join([
            'fruits' => [
                'table' => 'fruits',
                'type' => 'inner',
                'conditions' => 'fruits.id = votes.fruit_id',
            ]
          ]);
        $VotedFruitName =  $fruitName->select([
            'fruits.name'
          ])->where(['user_id'=>$uid])->order(['created' => 'DESC'])->first();
        $this->set(compact('VotedFruitName'));
        //$this->delVote();
        //Add new vote to the DB
        $this->addVote();
    }
    public function delVote(){
      $uid = $this->Auth->User('id');
      $entity = $this->Votes->find()->where(['user_id'=>$uid])->order(['created' => 'DESC'])->first();
      $result = $this->Votes->delete($entity);
    }
    public function addVote(){
              //Add current vote to DB
              $uid = $this->Auth->User('id');
              $vote = $this->Votes->newEntity();
              $vote->user_id = $uid;
              //Add vote count + 1 to current vote count
              $vote->fruit_id = $this->request->data('snack')+1;

              //Find new total of votes by the current user
              $votes = $this->Votes->find('all');
                $votes->join([
                      'fruits' => [
                          'table' => 'fruits',
                          'type' => 'inner',
                          'conditions' => 'fruits.id = votes.fruit_id',
                      ]
                  ]);
                  $votes -> select([
                    'fruits.name',
                    'count'=> $votes->func()->count('fruit_id')])->where(['user_id'=>$uid])
                    ->group('fruit_id')->order(['count' => 'ASC']);

              $this->set(compact('votes'));
              if($this->request->is('post')){
                $vote = $this->Votes->patchEntity($vote,$this->request->data);
                  if($this->Votes->save($vote)){
                    $this->Flash->success('You have voted');
                    return $this->redirect(['action'=>'index']);
                  }
                  else{
                    $this->Flash->error(__('Not registered'));
                  }
              }
      }

      public function dashboard(){
        //Find total votes for each fruit
        $votes = $this->Votes->find('all');
          $votes->join([
                'fruits' => [
                    'table' => 'fruits',
                    'type' => 'inner',
                    'conditions' => 'fruits.id = votes.fruit_id',
                ]
            ]);
            $votes -> select([
              'fruits.name',
              'count'=> $votes->func()->count('fruit_id')])
              ->group('fruit_id')->order(['count' => 'ASC']);

        $this->set(compact('votes'));
      }

    /**
     * View method
     *
     * @param string|null $id Vote id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vote = $this->Votes->get($id, [
            'contain' => ['Fruits', 'Users']
        ]);

        $this->set('vote', $vote);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vote = $this->Votes->newEntity();
        if ($this->request->is('post')) {
            $vote = $this->Votes->patchEntity($vote, $this->request->getData());
            if ($this->Votes->save($vote)) {
                $this->Flash->success(__('The vote has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vote could not be saved. Please, try again.'));
        }
        $fruits = $this->Votes->Fruits->find('list', ['limit' => 200]);
        $users = $this->Votes->Users->find('list', ['limit' => 200]);
        $this->set(compact('vote', 'fruits', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vote id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vote = $this->Votes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vote = $this->Votes->patchEntity($vote, $this->request->getData());
            if ($this->Votes->save($vote)) {
                $this->Flash->success(__('The vote has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vote could not be saved. Please, try again.'));
        }
        $fruits = $this->Votes->Fruits->find('list', ['limit' => 200]);
        $users = $this->Votes->Users->find('list', ['limit' => 200]);
        $this->set(compact('vote', 'fruits', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vote id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vote = $this->Votes->get($id);
        if ($this->Votes->delete($vote)) {
            $this->Flash->success(__('The vote has been deleted.'));
        } else {
            $this->Flash->error(__('The vote could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
