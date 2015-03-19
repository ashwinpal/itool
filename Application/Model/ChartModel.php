<?php

class chart
{
	private $id;
	private $chart_name;
	private $chart_link;

	public function getId()
	{
		return $this->id;
	}
	public function setId($value)
	{
		$this->id = $value;
	}

	public function getchartName()
	{
		return $this->chart_name;
	}
	public function setchartLink($value)
	{
		$this->chart_name = $value;
	}

	public function getchartLink()
	{
		return $this->chart_link;
	}
	public function setchartLink($value)
	{
		$this->chart_link = $value;
	}
}

?>