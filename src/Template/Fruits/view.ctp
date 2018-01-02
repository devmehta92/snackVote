<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fruit $fruit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fruit'), ['action' => 'edit', $fruit->ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fruit'), ['action' => 'delete', $fruit->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $fruit->ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Fruits'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fruit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Votes'), ['controller' => 'Votes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vote'), ['controller' => 'Votes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fruits view large-9 medium-8 columns content">
    <h3><?= h($fruit->ID) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($fruit->Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($fruit->ID) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Votes') ?></h4>
        <?php if (!empty($fruit->votes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Fruit Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fruit->votes as $votes): ?>
            <tr>
                <td><?= h($votes->id) ?></td>
                <td><?= h($votes->fruit_id) ?></td>
                <td><?= h($votes->user_id) ?></td>
                <td><?= h($votes->created) ?></td>
                <td><?= h($votes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Votes', 'action' => 'view', $votes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Votes', 'action' => 'edit', $votes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Votes', 'action' => 'delete', $votes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $votes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
