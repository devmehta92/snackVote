<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Vote[]|\Cake\Collection\CollectionInterface $votes
 */
?>

<div class="votes index large-9 medium-8 columns content">
    <h3><?= __('My Vote History') ?></h3>

<?php if($VotedFruitName) : ?>
  <table>
  <th>
    Snacks
  </th>
  <th>
    My Votes
  </th>
    <?php foreach ($votes as $vote) { ?>
      <tr>
        <td>
          <label>
            <?php if($VotedFruitName->fruits['name'] == $vote->fruits['name']) : ?>
            <?= $vote->fruits['name']; ?><span class="secondary radius label" style="margin-left:10px;">Last Voted</span>
          <?php else : ?>
            <?= $vote->fruits['name']; ?>
          <?php endif; ?>
        </label>
        </td>
        <td>
          <?= $vote->count ; ?>
        </td>
      </tr>
    <?php } ?>
</table>
  <!-- <h5>You last voted for -  //$VotedFruitName->fruits['name']; </h5> -->
<?php endif; ?>
<h4>Cast your new vote:</h4>
    <?= $this->Form->create(); ?>
      <?=$this->Form->radio('snack',['Apple','Orange','Banana','Pineapple'],array('class'=>'')); ?>
      <?= $this->Form->button('Submit',array('class'=>'small button'));  ?>
    <?= $this->Form->end(); ?>
</div>
