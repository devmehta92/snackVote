<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fruits Controller
 *
 * @property \App\Model\Table\FruitsTable $Fruits
 *
 * @method \App\Model\Entity\Fruit[] paginate($object = null, array $settings = [])
 */
class FruitsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $fruits = $this->paginate($this->Fruits);

        $this->set(compact('fruits'));
    }

    /**
     * View method
     *
     * @param string|null $id Fruit id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fruit = $this->Fruits->get($id, [
            'contain' => ['Votes']
        ]);

        $this->set('fruit', $fruit);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fruit = $this->Fruits->newEntity();
        if ($this->request->is('post')) {
            $fruit = $this->Fruits->patchEntity($fruit, $this->request->getData());
            if ($this->Fruits->save($fruit)) {
                $this->Flash->success(__('The fruit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fruit could not be saved. Please, try again.'));
        }
        $this->set(compact('fruit'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fruit id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fruit = $this->Fruits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fruit = $this->Fruits->patchEntity($fruit, $this->request->getData());
            if ($this->Fruits->save($fruit)) {
                $this->Flash->success(__('The fruit has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fruit could not be saved. Please, try again.'));
        }
        $this->set(compact('fruit'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fruit id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fruit = $this->Fruits->get($id);
        if ($this->Fruits->delete($fruit)) {
            $this->Flash->success(__('The fruit has been deleted.'));
        } else {
            $this->Flash->error(__('The fruit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
