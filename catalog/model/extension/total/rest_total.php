<?php
class ModelExtensionTotalRestTotal extends Model {
	public function getTotal($total) {
		$this->load->language('extension/total/rest_total');
		
		if($this->config->get('config_partial_payments_status')) {
			$upfront_payment_status = (int) $this->config->get('config_partial_payments_status');

			if (isset($this->session->data['partial_payments_value'])) {
				$upfront_payment_value = (float) $this->session->data['partial_payments_value'];
			} else {
				$upfront_payment_value = 0;
			}

			if($upfront_payment_status && $upfront_payment_value != 0) {
				$total['totals'][] = array(
					'code'       => 'rest_total',
					'title'      => $this->language->get('text_rest_total'),
					'value'      => max(0, $total['total']),
					'sort_order' => $this->config->get('total_rest_total_sort_order')
				);
			}
		}
	}
}