<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Rooms Controller
 *
 * @property \App\Model\Table\RoomsTable $Rooms
 *
 * @method \App\Model\Entity\Room[] paginate($object = null, array $settings = [])
 */
class RoomsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $rooms = $this->paginate($this->Rooms);

        $this->set(compact('rooms'));
        $this->set('_serialize', ['rooms']);
    }

    /**
     * View method
     *
     * @param string|null $id Room id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $room = $this->Rooms->get($id);
        
        $monday=new Time("monday this week");
        $sunday=new Time("monday next week");
        $showtime = $this->Rooms->Showtimes->find()->where(['Showtimes.room_id' => $id])->where(['Showtimes.start >=' => $monday ])->where(['Showtimes.start <=' => $sunday ])->contain(['Movies', 'Rooms']);
        $lundi=[];
        $mardi=[];
        $mercredi=[];
        $jeudi=[];
        $vendredi=[];
        $samedi=[];
        $dimanche=[];
        foreach($showtime as $value){
                    if($value->start->format("N")==1){
                        $lundi[]=$value;
                        }
                    if($value->start->format("N")==2){
                        $mardi[]=$value;
                        }
                    if($value->start->format("N")==3){
                        $mercredi[]=$value;
                        }
                    if($value->start->format("N")==4){
                        $jeudi[]=$value;
                        }
                    if($value->start->format("N")==5){
                        $vendredi[]=$value;
                        }
                    if($value->start->format("N")==6){
                        $samedi[]=$value;
                        }
                    if($value->start->format("N")==7){
                        $dimanche[]=$value;
                        }
                    
            }
            $showtimesWeek=[];
            foreach($showtime as $showtimes){
             $showtimesWeek[$showtimes->start->format('N')]=$showtimes;     
            }
        
        
        $this->set('room', $room);
        $this->set('showtime', $showtime);
        $this->set('showtimesWeek', $showtimesWeek);
        $this->set('lundi',$lundi);
        $this->set('mardi',$mardi);
        $this->set('mercredi',$mercredi);
        $this->set('jeudi',$jeudi);
        $this->set('vendredi',$vendredi);
        $this->set('samedi',$samedi);
        $this->set('dimanche',$dimanche);
        $this->set('_serialize', ['room']);
       
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $room = $this->Rooms->newEntity();
        if ($this->request->is('post')) {
            $room = $this->Rooms->patchEntity($room, $this->request->getData());
            if ($this->Rooms->save($room)) {
                $this->Flash->success(__('The room has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The room could not be saved. Please, try again.'));
        }
        $this->set(compact('room'));
        $this->set('_serialize', ['room']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Room id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $room = $this->Rooms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $room = $this->Rooms->patchEntity($room, $this->request->getData());
            if ($this->Rooms->save($room)) {
                $this->Flash->success(__('The room has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The room could not be saved. Please, try again.'));
        }
        $this->set(compact('room'));
        $this->set('_serialize', ['room']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Room id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $room = $this->Rooms->get($id);
        if ($this->Rooms->delete($room)) {
            $this->Flash->success(__('The room has been deleted.'));
        } else {
            $this->Flash->error(__('The room could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
