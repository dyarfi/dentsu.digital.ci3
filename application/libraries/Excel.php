<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Excel { 

    public function export($data) {
		
    	$first = (array) $data[0];
    	$columns = [];		
		$v = 1;		
		$c = count($first);
		foreach ($first as $key => $val) {
			if($v < $c) {
				$columns[] = key($first);
			}
			next($first);
			$v++;
		}			

		/**
         * No need to use an external library here. The only bad thing without using external library is that Microsoft Excel is complaining
         * that the file is in a different format than specified by the file extension. If you press "Yes" everything will be just fine.
         * */
        $string_to_export = "";
        foreach ($columns as $column) {
        	$string_to_export .= $this->_set_field_name($column) . "\t";
        }
        $string_to_export .= "\n";
        
        foreach ($data as $num_row => $row) {
            foreach ($columns as $column) {
                $string_to_export .= $this->_trim_export_string($row->{$column}) . "\t";
            }
            $string_to_export .= "\n";
        }
        
        // Convert to UTF-16LE and Prepend BOM
        $string_to_export = "\xFF\xFE" . mb_convert_encoding($string_to_export, 'UTF-16LE', 'UTF-8');

        $filename = "export-" . date("Y-m-d_H:i:s") . ".xls";

        header('Content-type: application/vnd.ms-excel;charset=UTF-16LE');
        header('Content-Disposition: attachment; filename=' . $filename);
        header("Cache-Control: no-cache");
        echo $string_to_export;
        die();
    }

    protected function _trim_export_string($value) {
        $value = str_replace(array("&nbsp;", "&amp;", "&gt;", "&lt;"), array(" ", "&", ">", "<"), $value);
        return strip_tags(str_replace(array("\t", "\n", "\r"), "", $value));
    }

    protected function _set_field_name($value) {
        $value = ucwords(str_replace('_', ' ', $value));
        return $value;
    }

}

/* End of file Excel.php */
/* Location: ./application/libraries/Excel.php */