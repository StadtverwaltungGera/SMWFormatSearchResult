<?php
/**
*	Hook
*/
class SMWFormatSearchResultHooks {
	public static function onShowSearchHitTitle(Title &$title, &$titleSnippet, SearchResult $result, $terms, SpecialSearch $specialSearch, array &$query) {
#	public static function onShowSearchHitTitle(Title &$title, &$titleSnippet, SearchResult $result, $terms, SpecialSearch $specialSearch, array &$query, array &$attributes ) {
		if(strpos($title->mUrlform, "Mitarbeiter/")!==FALSE) {
			$a=Article::newFromID($title->mArticleID);
			$smText = $a->getPage()->getContent()->mText;

			if(preg_match ( "/\|Nachname=(.*)/m" , $smText, $matches)) {
				$titleSnippet.=$matches[1]; 
				$titleSnippet.=", ";
			}
			if(preg_match ( "/\|Vorname=(.*)/m" , $smText, $matches)) {
				$titleSnippet.=$matches[1]; 
				$titleSnippet.=" ";
			} 
			if(preg_match ( "/\|ElternOE=(.*)/m" , $smText, $matches)) {
				$titleSnippet.= "(".$matches[1].")";
			} else {
				$titleSnippet.= "(keine Organisationseinheit gefunden)";
			}
		}
	}
}
?>