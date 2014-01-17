<?php

class BcArraySortOperator {
    function __construct() {
		$this->sort_flags = array(
		'SORT_REGULAR' => SORT_REGULAR,
		'SORT_NUMERIC' => SORT_NUMERIC,
		'SORT_STRING' => SORT_STRING,
		'SORT_LOCALE_STRING' => SORT_LOCALE_STRING,
		'SORT_NATURAL' => SORT_NATURAL
		);
    }

    function operatorList() {
        return array('sort', 'rsort', 'asort', 'arsort', 'ksort', 'krsort', 'natsort', 'natcasesort');
    }

    function namedParameterPerOperator() {
        return true;
    }

    function namedParameterList() {
        return array(
			'sort' => array('sort_flags' => array('type' => 'string', 'required' => false, 'default' => 'SORT_REGULAR')),
            'rsort' => array('sort_flags' => array('type' => 'string', 'required' => false, 'default' => 'SORT_REGULAR')),
			'asort' => array('sort_flags' => array('type' => 'string', 'required' => false, 'default' => 'SORT_REGULAR')),
            'arsort' => array('sort_flags' => array('type' => 'string', 'required' => false, 'default' => 'SORT_REGULAR')),
			'ksort' => array('sort_flags' => array('type' => 'string', 'required' => false, 'default' => 'SORT_REGULAR')),
            'krsort' => array('sort_flags' => array('type' => 'string', 'required' => false, 'default' => 'SORT_REGULAR')),
			'natsort' => null,
			'natcasesort' => null
        );
    }

    function modify($tpl, $operatorName, $operatorParameters, $rootNamespace, $currentNamespace, &$operatorValue, $namedParameters, $placement) {
        switch($operatorName) {
                case 'sort':
                case 'rsort':
                case 'asort':
                case 'arsort':
                case 'ksort':
                case 'krsort':
			    $sort_flags = $namedParameters['sort_flags'];
				$sort_flags = isset($this->sort_flags[$sort_flags]) ? $this->sort_flags[$sort_flags] : $this->sort_flags['SORT_REGULAR'];
                if(!$operatorName($operatorValue, $sort_flags)) {
                    $operatorValue = false;
                }
            break;
			case 'natsort':
			case 'natcasesort':
				if(!$operatorName($operatorValue)) {
                    $operatorValue = false;
                }
			break;
            default:
                $tpl->warning($operatorName, "Unknown input type '$operatorName'", $placement);
        }
    }
}
