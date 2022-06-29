<?php
class ModelExtensionTotalUpfrontPayment extends Model
{
    public function getTotal($total) {
		$this->load->language('extension/total/upfront_payment');

		if($this->config->get('config_partial_payments_status')) {
			$upfront_payment_status = (int) $this->config->get('config_partial_payments_status');
			
			if($upfront_payment_status) {
				$partial_payments_minimum = (float) $this->config->get('config_partial_payments_minimum');

				$upfront_payment_value = $partial_payments_minimum;

				$total['totals'][] = array(
					'code'       => 'upfront_payment',
					'title'      => $this->language->get('text_upfront_payment'),
					'value'      => $upfront_payment_value,
					'sort_order' => $this->config->get('total_upfront_payment_sort_order')
				);

				$total['total'] -= $upfront_payment_value;
			}
		}
	}
}