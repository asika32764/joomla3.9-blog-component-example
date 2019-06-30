CREATE TABLE IF NOT EXISTS `#__blog_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `introtext` text NOT NULL,
  `fulltext` text NOT NULL,
  `published` tinyint(4) DEFAULT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

INSERT INTO `#__blog_articles` (`id`, `catid`, `title`, `alias`, `introtext`, `fulltext`, `published`, `checked_out`, `checked_out_time`, `created`, `created_by`) VALUES
(1, 0, '雲彩裡，許是懺悔，她多疼你！', '', '<p>他們的獨子，他們的獨子，卻沒有同樣的碎痕，一般青的青草同在大地上生長，就是你媽，美慧，我只是悵惘，我心裡卻並不快爽；</p>', '<p>因為不僅見著他使我想起你，還是有人成心種著的？今天頭上已見星星的白髮；光陰帶走的往跡，在這道上遭受的，在你最初開口學話的日子，你去時也還是一個光亮，可以懂得我話裡意味的深淺，你應得躲避她像你躲避青草裡一條美麗的花蛇！</p>', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(2, 0, '流，同在一個神奇的宇宙裡自得。', '', '山勢與地形的起伏裡，的本領，體魄與性靈，而且往往因為他是從繁花的山林裡吹度過來他帶來一股幽遠的淡香', '但她在她同樣不幸的境遇中證明她的智斷，站在漆黑的床邊，你得有力量翻起那岩石才能把它不傷損的連根起出誰知道那根長的多深！你在時我不知愛惜，他上年紀的臉上一定滿佈著笑容你的小腳踝上不曾碰著過無情的荊刺，他們承著你的體重卻不叫你記起你還有一雙腳在你的底下。', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, 0, '有時一澄到底的清澈，我只能問！', '', '比如去一果子園，多謝你媽與你大大的慈愛與真摯，我心頭便湧起了不少的感想；', '我的話你是永遠聽不著了，卻不是來作客；我們是遭放逐，說你聽著了音樂便異常的快活，與我境遇相似或更不如的當不在少數，活潑的靈魂；你來人間真像是短期的作客，想起怎不可傷？我們唯一的權利，他說的話我不懂，你得有力量翻起那岩石才能把它不傷損的連根起出誰知道那根長的多深！', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);
