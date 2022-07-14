<?php
class ModelVltechPartialPayments extends Model
{
    public function setup() {
        $query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "order` LIKE 'partial_payments_status'");
        if($query->rows) {
            // do nothing
        } else {
            $sql = "ALTER TABLE `" . DB_PREFIX . "order` ADD `partial_payments_status` tinyint(1) DEFAULT 0";
            $this->db->query($sql);
        }
        
        $query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "order` LIKE 'upfront_payment'");
        if($query->rows) {
            // do nothing
        } else {
            $sql = "ALTER TABLE `" . DB_PREFIX . "order` ADD `upfront_payment` decimal(15,4) DEFAULT 0";
            $this->db->query($sql);
        }

        $query = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "order` LIKE 'rest_total'");
        if($query->rows) {
            // do nothing
        } else {
            $sql = "ALTER TABLE `" . DB_PREFIX . "order` ADD `rest_total` decimal(15,4) DEFAULT 0";
            $this->db->query($sql);
        }

        // Create table to save screenshot
        $this->db->query("
			CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "order_multi_payments` (
			    `order_payment_id` INT(11) NOT NULL AUTO_INCREMENT,
	            `order_id` INT(11) NOT NULL DEFAULT 0,
	            `status` tinyint(1) NOT NULL DEFAULT 0,
	            `payment_value` decimal(15,4) NOT NULL DEFAULT 0,
	            `screenshot` varchar(255) NOT NULL DEFAULT '',
	            `date_added` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	        PRIMARY KEY (`order_payment_id`)
		) DEFAULT COLLATE=utf8_general_ci;");
    }
}