<?php namespace controllers;
use core\view;
/*
 * Blockexplorer controller
 *
 */
class Api extends \core\controller{

	/**
	 * call the parent construct
	 */
	public function __construct(){
		parent::__construct();

		$this->language->load('welcome');
	}

	public function index() {
		$data['title'] = 'Monero blocks API';
/*
		$rpccalls = new \models\rpc_calls();
		$info = json_decode($rpccalls->getCoinInfo(), true);
		$data['diff'] = $info['difficulty'];
		$data['height'] = $info['height'];
		$data['hashrate'] = round($info['difficulty'] / 60,2);
*/
		View::rendertemplate('header', $data);
		View::render('api/default', $data);
		View::rendertemplate('footer', $data);
	}

	public function get_stats() {

		$database = new \models\database();
		$stats = json_decode($database->get_stats(),true);

                $data['difficulty'] = $stats[0]['block_difficulty'];
                $data['height'] = $stats[0]['height'];
                $data['hashrate'] = $data['difficulty'] / 60 / 2; //2 min block time
                $data['total_emission'] = $stats[0]['coins_generated'];
		$data['last_reward'] = $stats[0]['reward'];
		$data['last_timestamp'] = $stats[0]['timestamp'];

		echo json_encode($data);
	}

	public function get_block_header($param) {
		$rpccalls = new \models\rpc_calls();

		$param = $param[0];

		//o tamanho da hash � 64 bytes
		if ($this->isValidHash($param)){
			$block = json_decode($rpccalls->getBlockHeaderByHash($param), true);
		}elseif ($this->isValidHeight($param)){
			$block = json_decode($rpccalls->getBlockHeaderByHeight($param), true);
		}else{
			$data['status'] = "ERROR";
			$data['error'] = 'Invalid parameter';
			$data['method'] = 'get_block_header';
			$data['param_value'] = $param;
		}

		if (array_key_exists("result",$block)){
			$data = $block['result'];
		}else{
			$data['status'] = "ERROR";
			$data['error'] = 'Block not found';
			$data['method'] = 'get_block_header';
			$data['param_value'] = $param;
		}

		echo json_encode($data);
	}

	public function get_block_data($param) {
		$rpccalls = new \models\rpc_calls();

		$param = $param[0];

		//o tamanho da hash � 64 bytes
		if ($this->isValidHash($param)){
			$block = json_decode($rpccalls->getBlockHeaderByHash($param), true);
		}elseif ($this->isValidHeight($param)){
			$block = json_decode($rpccalls->getBlockHeaderByHeight($param), true);
		}else{
			$data['status'] = "ERROR";
			$data['error'] = 'Invalid parameter';
			$data['method'] = 'get_block_data';
			$data['param_value'] = $param;
		}

		if (array_key_exists("result",$block)){
			$blockheader = $block['result']['block_header'];
			$data['status'] = 'OK';
			$data['block_data'] = json_decode($rpccalls->getBlockInfoByHash($blockheader['hash']), true);

		}else{
			$data['status'] = "ERROR";
			$data['error'] = 'Block not found';
			$data['method'] = 'get_block_data';
			$data['param_value'] = $param;
		}

		echo json_encode($data);
	}

	public function is_key_image_spent($param) {
		$rpccalls = new \models\rpc_calls();

		$param = $param[0];

		if ($this->isValidHash($param)){
			$rpc_resp = json_decode($rpccalls->isKeyImageSpent($param), true);
//			var_dump($rpc_resp);

			echo json_encode($rpc_resp);
		}
	}

	public function get_transaction_data($param) {
		$rpccalls = new \models\rpc_calls();

		$param = $param[0];

		if ($this->isValidHash($param)){
			$rpc_resp = json_decode($rpccalls->getTransactionHex($param), true);

			//if the is such tx hash it returns an object containing "txs_as_hex"
			//if not returns an object containing "missed_tx"
			if(array_key_exists("txs_as_hex",$rpc_resp)){
				$tx_list = $rpc_resp['txs_as_hex'];
				//we are only expecting 1 transaction
				if(count($tx_list) == 1){
					$tx_blob = $tx_list[0];
					$txsize = strlen($tx_blob);
					$tx_details = json_decode(decode_tx_blob($tx_blob), true);
				}

				$data['status'] = "OK";
				$data['transaction_data'] = $tx_details;
			}else{
				$data['status'] = "ERROR";
				$data['error'] = 'Transaction not found';
				$data['method'] = 'get_transaction_data';
				$data['param_value'] = $param;
			}
			
		}else{
			$data['status'] = "ERROR";
			$data['error'] = 'Invalid parameter';
			$data['method'] = 'get_transaction_data';
			$data['param_value'] = $param;
		}		
			
		echo json_encode($data);	
	}
	
	public function error($param) {	
	
		var_dump($param);
	}

	/**
	 * Determine if supplied string is a valid Hash
	 *
	 * @param string $str String to validate
	 * @return boolean
	 */
	public function isValidHash($str)
	{
		//return !empty($str) && preg_match('/^[a-f0-9]{64}$/', $str);
		return !empty($str) && preg_match('/^[0-9A-Fa-f]{64}/', $str);
	}

	/**
	 * Determine if supplied string is a valid Height Number
	 *
	 * @param string $str String to validate
	 * @return boolean
	 */
	function isValidHeight($str)
	{
		return !empty($str) && preg_match('/^[0-9]+$/', $str);
	}
}
