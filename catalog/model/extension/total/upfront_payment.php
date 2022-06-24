<?php
class ModelExtensionTotalUpfrontPayment extends Model
{
    public function getTotal($total) {
		$this->load->language('extension/total/upfront_payment');

		$upfront_payment_value = 10;

		$total['totals'][] = array(
			'code'       => 'upfront_payment',
			'title'      => $this->language->get('text_upfront_payment'),
			'value'      => $upfront_payment_value,
			'sort_order' => $this->config->get('total_upfront_payment_sort_order')
		);

		$total['total'] -= $upfront_payment_value;
	}
}