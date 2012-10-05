<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_usuario'); ?>
		<?php echo $form->textField($model,'id_usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Nombre'); ?>
		<?php echo $form->textField($model,'Nombre',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Paterno'); ?>
		<?php echo $form->textField($model,'Paterno',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Materno'); ?>
		<?php echo $form->textField($model,'Materno',array('size'=>60,'maxlength'=>100)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'NombreCompleto'); ?>
		<?php echo $form->textField($model,'NombreCompleto',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Telefono'); ?>
		<?php echo $form->textField($model,'Telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Correo'); ?>
		<?php echo $form->textField($model,'Correo',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Foto'); ?>
		<?php echo $form->textField($model,'Foto'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->