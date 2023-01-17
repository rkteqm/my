<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Detail> $details
 */
?>
<div class="details index content">
    <?= $this->Html->link(__('New Detail'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Details') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('city') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($details as $detail): ?>
                <tr>
                    <td><?= $this->Number->format($detail->id) ?></td>
                    <td><?= $detail->has('user') ? $this->Html->link($detail->user->name, ['controller' => 'Users', 'action' => 'view', $detail->user->id]) : '' ?></td>
                    <td><?= h($detail->city) ?></td>
                    <td><?= h($detail->phone) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $detail->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $detail->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $detail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detail->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
