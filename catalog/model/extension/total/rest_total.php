<?php
class ModelExtensionTotalRestTotal extends Model {
	public function getTotal($total) {
		$this->load->language('extension/total/rest_total');
		
		if($this->config->get('config_partial_payments_status')) {
			$total['totals'][] = array(
				'code'       => 'rest_total',
				'title'      => $this->language->get('text_rest_total'),
				'value'      => max(0, $total['total']),
				'sort_order' => $this->config->get('total_rest_total_sort_order')
			);
		}
	}
}