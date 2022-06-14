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
    }
}