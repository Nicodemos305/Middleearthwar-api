<?php
namespace repository;
use repository\DataSource;

class RankingDao extends DataSource{

	function rankingWinners(){
		$sql = "select h.name,count(b.win_battle) as won from battle b inner join hero h on b.win_battle = h.id group by b.win_battle";
		return parent::findAllEntity($sql);
	}
}