<br />
<div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns">
    <div class="panel">
      <h3><?= __('Votes') ?></h3>
      <table>
      <th>
        Snacks
      </th>
      <th>
        Total Votes
      </th>
        <?php foreach ($votes as $vote) { ?>
          <tr>
            <td>
              <?= $vote->fruits['name']; ?>
            </td>
            <td>
              <?= $vote->count ; ?>
            </td>
          </tr>
        <?php } ?>
  </table>
    </div>
    <div class="text-center">
      <?php if($loggedIn) : ?>
      <?= $this->Html->link('Vote Now',['controller'=>'votes','action'=>'index'],array('class'=>'small button')); ?>
      <?php else : ?>
      <?= $this->Html->link('Login to vote',['controller'=>'users','action'=>'login'],array('class'=>'small button')); ?>
    <?php endif; ?>
    </div>
</div>
