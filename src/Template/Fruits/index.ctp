<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fruit[]|\Cake\Collection\CollectionInterface $fruits
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fruit'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Votes'), ['controller' => 'Votes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Vote'), ['controller' => 'Votes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fruits index large-9 medium-8 columns content">
    <h3><?= __('Fruits') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fruits as $fruit): ?>
            <tr>
                <td><?= $this->Number->format($fruit->ID) ?></td>
                <td><?= h($fruit->Name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fruit->ID]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fruit->ID]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fruit->ID], ['confirm' => __('Are you sure you want to delete # {0}?', $fruit->ID)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
