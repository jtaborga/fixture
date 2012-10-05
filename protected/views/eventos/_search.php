<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_evento'); ?>
		<?php echo $form->textField($model,'id_evento'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'Nombre'); ?>
		<?php echo $form->textField($model,'Nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Participante1'); ?>
		<?php echo $form->textField($model,'Participante1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Participante2'); ?>
		<?php echo $form->textField($model,'Participante2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha'); ?>
		<?php echo $form->textField($model,'Fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Estado'); ?>
		<?php echo $form->textField($model,'Estado',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaCreacion'); ?>
		<?php echo $form->textField($model,'FechaCreacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_usuarioC'); ?>
		<?php echo $form->textField($model,'id_usuarioC'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaModificacion'); ?>
		<?php echo $form->textField($model,'FechaModificacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_usuarioM'); ?>
		<?php echo $form->textField($model,'id_usuarioM'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->