<div class="roundcircle">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'eventos-form',
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note white"><?php echo Yii::t('app', 'Fields with '); ?><span class="required">*</span><?php echo Yii::t('app', ' are required.'); ?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row white">
		<?php echo $form->labelEx($model,'Nombre'); ?>
		<?php echo $form->textField($model,'Nombre'); ?>
		<?php echo '<span class="nota">Ejemplo: Cl&aacute;sico Cruce&ntilde;o</span>'; ?>
		<?php echo $form->error($model,'Nombre'); ?>
	</div>
	
	<div class="row white">
		<?php echo $form->labelEx($model,'Participante1'); ?>
		<?php echo $form->dropDownList($model,'Participante1', CHtml::listData(Participantes::model()->findAll(), 'id_participante', 'Nombre'), array('empty' => 'Seleccione Participante')); ?>
		<?php echo $form->error($model,'Participante1'); ?>
	</div>

	<div class="row white">
		<?php echo $form->labelEx($model,'Participante2'); ?>
		<?php echo $form->dropDownList($model,'Participante2', CHtml::listData(Participantes::model()->findAll(), 'id_participante', 'Nombre'), array('empty' => 'Seleccione Participante')); ?>
		<?php echo $form->error($model,'Participante2'); ?>
	</div>

	<div class="row white">
		<?php echo $form->labelEx($model,'Fecha'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
							array('model' => $model,
								  'attribute' => 'Fecha',
								  'language' => 'es',
								  'options' => array(
								  'dateFormat' => 'yy-mm-dd',
								  'constrainInput' => 'false',
								  'duration' => 'fast',
								  'showAnim' => 'slide')
								  )
							);
		?>
		<?php echo $form->error($model,'Fecha'); ?>
	</div>
	
	<div class="row white">
		<?php echo $form->labelEx($model,'Horas'); ?>
		<?php $this->widget('CMaskedTextField', array(
                            'model' => $model,
                            'attribute' => 'Horas',
                            'mask' => '99',
                            'htmlOptions' => array('size' => 10)
                            )); ?>
        <?php echo $form->error($model,'Horas'); ?>
	</div>
	
	<div class="row white">
		<?php echo $form->labelEx($model,'Minutos'); ?>
		<?php $this->widget('CMaskedTextField', array(
                            'model' => $model,
                            'attribute' => 'Minutos',
                            'mask' => '99',
                            'htmlOptions' => array('size' => 10)
                            )); ?>
        <?php echo $form->error($model,'Minutos'); ?>
	</div>
	
	
	<div class="row white">
		<?php echo $form->labelEx($model,'FechaVencimiento'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
							array('model' => $model,
								  'attribute' => 'FechaVencimiento',
								  'language' => 'es',
								  'options' => array(
								  'dateFormat' => 'yy-mm-dd',
								  'constrainInput' => 'false',
								  'duration' => 'fast',
								  'showAnim' => 'slide')
								  )
							);
		?>
		<?php echo '<span class="nota">Caducidad: Fecha l&iacute;mite para apuesta</span>'; ?>
		<?php echo $form->error($model,'FechaVencimiento'); ?>
	</div>
	
	<div class="row white">
		<?php echo $form->labelEx($model,'HorasVence'); ?>
		<?php $this->widget('CMaskedTextField', array(
                            'model' => $model,
                            'attribute' => 'HorasVence',
                            'mask' => '99',
                            'htmlOptions' => array('size' => 10)
                            )); ?>
        <?php echo $form->error($model,'HorasVence'); ?>
	</div>
	
	<div class="row white">
		<?php echo $form->labelEx($model,'MinutosVence'); ?>
		<?php $this->widget('CMaskedTextField', array(
                            'model' => $model,
                            'attribute' => 'MinutosVence',
                            'mask' => '99',
                            'htmlOptions' => array('size' => 10)
                            )); ?>
        <?php echo $form->error($model,'MinutosVence'); ?>
	</div>
	
	<div class="row white">
		<?php echo $form->labelEx($model,'id_costo'); ?>
		<?php echo $form->dropDownList($model,'id_costo', CHtml::listData(Costos::model()->findAll(), 'id_costo', 'costo'), array('empty' => 'Seleccione Precio')); ?>
		<?php echo '<span class="nota">'.Monedas::model()->findByPk(1)->abreviatura.'</span>'; ?>
		<?php echo $form->error($model,'id_costo'); ?>
	</div>
	
	<div class="row white">
		<?php echo $form->labelEx($model,'Estado'); ?>
		<?php echo $form->dropDownList($model,'Estado',array('1'=>'Activo','0'=>'Inactivo')); ?>
		<?php echo $form->error($model,'Estado'); ?>
	</div>
	<?php 
	/*
	<div class="row">
		<?php echo $form->labelEx($model,'FechaCreacion'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
							array('model' => $model,
								  'attribute' => 'FechaCreacion',
								  'language' => 'es',
								  'options' => array(
								  'dateFormat' => 'yy-mm-dd',
								  'constrainInput' => 'false',
								  'duration' => 'fast',
								  'showAnim' => 'slide')
								  )
							);
		?>
		<?php echo $form->error($model,'FechaCreacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_usuarioC'); ?>
		<?php echo $form->dropDownList($model,'id_usuarioC', CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'NombreCompleto')); ?>
		<?php echo $form->error($model,'id_usuarioC'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FechaModificacion'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',
							array('model' => $model,
								  'attribute' => 'FechaModificacion',
								  'language' => 'es',
								  'options' => array(
								  'dateFormat' => 'yy-mm-dd',
								  'constrainInput' => 'false',
								  'duration' => 'fast',
								  'showAnim' => 'slide')
								  )
							);
		?>
		<?php echo $form->error($model,'FechaModificacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_usuarioM'); ?>
		<?php echo $form->dropDownList($model,'id_usuarioM', CHtml::listData(Usuarios::model()->findAll(), 'id_usuario', 'NombreCompleto')); ?>
		<?php echo $form->error($model,'id_usuarioM'); ?>
	</div>
	*/
	?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'), array('class'=>'vinculowhite')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>