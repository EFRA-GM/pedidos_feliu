<div class="datos view">
<h2><?php echo __('Dato'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($dato['Dato']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($dato['Dato']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono'); ?></dt>
		<dd>
			<?php echo h($dato['Dato']['telefono']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mail'); ?></dt>
		<dd>
			<?php echo h($dato['Dato']['mail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mision'); ?></dt>
		<dd>
			<?php echo h($dato['Dato']['mision']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vision'); ?></dt>
		<dd>
			<?php echo h($dato['Dato']['vision']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Objetivos'); ?></dt>
		<dd>
			<?php echo h($dato['Dato']['objetivos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitud'); ?></dt>
		<dd>
			<?php echo h($dato['Dato']['longitud']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Latitud'); ?></dt>
		<dd>
			<?php echo h($dato['Dato']['latitud']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Dato'), array('action' => 'edit', $dato['Dato']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Dato'), array('action' => 'delete', $dato['Dato']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $dato['Dato']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Datos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dato'), array('action' => 'add')); ?> </li>
	</ul>
</div>
