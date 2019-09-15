<?php namespace Shohabbos\Bigbluebutton\Classes;
	
class BbbApi
{
	private $key = "4Q5OqFFAvlkcoTPUPD1SFklIjRvrJ4KD2ZoxetDlIE";
	private $url = "https://vip.galileo-intelligence.com/bigbluebutton/api/";	



	public function call($method, array $data) {
		$url = $this->url.$method;
		$params = $this->generateQuery($method, $data);
		$url = $url."?".$params;

		$data = $this->xmlToArray(file_get_contents($url));

		if (!isset($data['returncode']) || $data['returncode'] == 'FAILED') {
			if (isset($data['message'])) {
				throw new \Exception($data['message'], 1);
			} else {
				throw new \Exception("Error Processing Request", 1);
			}
		}

		return $data;
	}


	private function xmlToArray($data) {
		$xml = simplexml_load_string($data, "SimpleXMLElement", LIBXML_NOCDATA);
		
		$json = json_encode($xml);

		return json_decode($json, true);
	}

	private function generateQuery(string $method, array $data) {
		$checksum = $this->generateChecksum(
			$method,
			http_build_query($data)
		);

		$data['checksum'] = $checksum;

		return http_build_query($data);
	}

	private function generateChecksum($method, $string) {
		return sha1($method.$string.$this->key);
	}
 


}

?>