<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Room $room
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Room'), ['action' => 'edit', $room->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Room'), ['action' => 'delete', $room->id], ['confirm' => __('Are you sure you want to delete # {0}?', $room->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Showtimes'), ['controller' => 'Showtimes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Showtime'), ['controller' => 'Showtimes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="rooms view large-9 medium-8 columns content">
    <h3><?= h($room->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($room->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($room->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Capacity') ?></th>
            <td><?= $this->Number->format($room->capacity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($room->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($room->modified) ?></td>
        </tr>
    </table>
    
    <table>
        <tr>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
            <th>Saturday</th>
            <th>Sunday</th>
            
        </tr>
        <tr>
            <td>
            <?php
            
            foreach($lundi as $value){
                echo('Name: '.$value->movie->name.'<br>');
                echo('Start Hour: '.$value->start->format('H:i').'<br>');
                echo('Duration: '.$value->movie->duration.'h'.'<br><br>');
            }
                ?>
            </td>
            <td><?php
            
            foreach($mardi as $value){
                echo('Name: '.$value->movie->name.'<br>');
                echo('Start Hour: '.$value->start->format('H:i').'<br>');
                echo('Duration: '.$value->movie->duration.'h'.'<br><br>');
            }
                ?></td>
            <td><?php
            
            foreach($mercredi as $value){
                echo('Name: '.$value->movie->name.'<br>');
                echo('Start Hour: '.$value->start->format('H:i').'<br>');
                echo('Duration: '.$value->movie->duration.'h'.'<br><br>');
            }
                ?></td>
            <td><?php
            
            foreach($jeudi as $value){
                echo('Name: '.$value->movie->name.'<br>');
                echo('Start Hour: '.$value->start->format('H:i').'<br>');
                echo('Duration: '.$value->movie->duration.'h'.'<br><br>');
            }
                ?></td>
            <td><?php
            
            foreach($vendredi as $value){
                echo('Name: '.$value->movie->name.'<br>');
                echo('Start Hour: '.$value->start->format('H:i').'<br>');
                echo('Duration: '.$value->movie->duration.'h'.'<br><br>');
            }
                ?></td>
            <td><?php
            
            foreach($samedi as $value){
                echo('Name: '.$value->movie->name.'<br>');
                echo('Start Hour: '.$value->start->format('H:i').'<br>');
                echo('Duration: '.$value->movie->duration.'h'.'<br><br>');
            }
                ?></td>
            <td>
            <?php
            
            foreach($dimanche as $value){
                echo('Name: '.$value->movie->name.'<br>');
                echo('Start Hour: '.$value->start->format('H:i').'<br>');
                echo('Duration: '.$value->movie->duration.'h'.'<br><br>');
            }
                ?>
                </td>
        </tr>            
    </table>
    <br>
    <br>
    <br>
    <table>
        <tr>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
            <th>Saturday</th>
            <th>Sunday</th>
            
        </tr>
        <tr>
            <?php
            
            for ($i = 1; $i <= 7; $i++) {
              echo'<td>';
              foreach($showtime as $value){
                  if($value->start->format('N')==$i){
                    echo('Name: '.$value->movie->name.'<br>');
                    echo('Start Hour: '.$value->start->format('H:i').'<br>');
                    echo('Duration: '.$value->movie->duration.'h'.'<br><br>'); 
                      
                    }
                  }
              
              echo'</td>';
            }
            ?>
            
        </tr>
    </table>
   
    
</div>
