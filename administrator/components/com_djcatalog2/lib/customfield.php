<?php
/**
 * @version $Id: customfield.php 140 2013-09-09 07:42:05Z michal $
 * @package DJ-Catalog2
 * @copyright Copyright (C) 2012 DJ-Extensions.com LTD, All rights reserved.
 * @license http://www.gnu.org/licenses GNU/GPL
 * @author url: http://dj-extensions.com
 * @author email contact@dj-extensions.com
 * @developer Michal Olczyk - michal.olczyk@design-joomla.eu
 *
 * DJ-Catalog2 is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * DJ-Catalog2 is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with DJ-Catalog2. If not, see <http://www.gnu.org/licenses/>.
 *
 */

defined('_JEXEC') or die;

class DJCatalog2CustomField extends JObject {

	static $type = '';
	static $base_type = '';

	public $params = null;

	public $id = 0;
	public $field_id = 0;
	public $name = '';
	public $value = null;
	public $item_id = 0;
	
	protected $table_name = null;

	public function __construct($field_id, $item_id, $name, $value = null) {
		$this->field_id = $field_id;
		$this->item_id = $item_id;
		$this->name = $name;
		$this->value = $value;
		$this->table = JTable::getInstance('FieldValues'.ucfirst(self::$base_type), 'Djcatalog2Table', array());
		$this->table_name = $this->table->getTableName();
	}

	public function save($value) {
		if(empty($value)) {
			return false;
		}

		$db = JFactory::getDbo();
		$rows = array();

		if (is_array($value)) {
			$query =' SELECT id '
					.' FROM ' . $this->table_name
					.' WHERE item_id='.(int)$this->item_id.' AND field_id=' . $this->field_id
					;
			$db->setQuery($query);
			$current_values = $db->loadColumn();
			$count = (count($current_values) > count($value)) ? count($current_values) : count($value);

			for ($i = 0; $i < $count; $i++) {
				if (isset($value[$i])) {
					$id = null;
					if (isset($current_values[$i])) {
						$id = $current_values[$i];
					}
						
					$rows[] = array(
							'id'=>$id,
							'item_id'=>$this->item_id,
							'field_id'=>$this->field_id,
							'value' => $value[$i]
					);
				} else {
					$delete_query =  ' DELETE '
							.' FROM ' . $this->table_name
							.' WHERE id='.(int)$current_values[$i];
						
					$db->setQuery($delete_query);
					$db->query();
				}
			}
		} else {
			// html field
			//$data[$fieldId] = JComponentHelper::filterText($data[$fieldId]);
			//$data[$fieldId] = preg_replace('/&(?![A-Za-z0-9#]{1,7};)/','&amp;',$data[$fieldId]);
				
			$id = null;
			if ($this->table->load(array('item_id'=>$this->item_id,'field_id'=>$this->field_id), true)) {
				$id = $this->table->id;
			}
			$rows[] = array(
					'id'=>$id,
					'item_id'=>$this->item_id,
					'field_id'=>$this->field_id,
					'value' => $value
			);
		}

		foreach($rows as $row) {
			$this->table->reset();
			
			// Load the row if saving an existing record.
			$isNew = true;
			if ($row['id'] > 0) {
				$this->table->load($row['id'], true);
				$isNew = false;
			}
				
			// Bind the data.
			if (!$this->table->bind($row)) {
				$this->setError($this->table->getError());
				return false;
			}
			// Check the data.
			if (!$this->table->check()) {
				$this->setError($this->table->getError());
				return false;
			}

			// Store the data.
			if (!$this->table->store()) {
				$this->setError($this->table->getError());
				return false;
			}
		}
	}

	public function delete() {
		$db = JFactory::getDbo();
		if ($this->item_id > 0 && $this->table_name){
			$db->setQuery('delete from '.$this->table_name.' where item_id='.(int)$this->item_id);
			$db->query();
		}
	}

	public function getLabel() {
		return $this->name;
	}

	public function getValue() {
		if (is_array($this->value)) {
			return implode(',', $this->value);
		}
		else {
			return $this->value;
		}
	}

	public function getFormLabel($attribs = '') {
		return '<label for="attribute_'.$v->id.'" '.$attribs.'>'.$this->name.'</label>';
	}

	public function getFormInput($attribs = '') {
		return '<input type="text" name="attribute['.$this->field_id.']" value="'.$this->getValue().' '.$attribs.'"/>';
	}

	public function getParamsInput() {
	}

}