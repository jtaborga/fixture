<div id="roundcircle">
	<div class="view">
		<div class="white"><?php echo $data->getAttributeLabel('id_costo').': '.CHtml::link(CHtml::encode($data->id_costo), array('view', 'id'=>$data->id_costo)); ?></div>
		<div class="white"><?php echo $data->getAttributeLabel('costo').': '.number_format($data->costo, 2,",",".").' '.Monedas::model()->findByPk($data->id_moneda)->abreviatura; ?></div>
	</div>
</div>
<br />