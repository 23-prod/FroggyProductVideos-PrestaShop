CREATE TABLE IF NOT EXISTS `@PREFIX@fpv_video_link` (
  `id_fpv_video_link` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_lang` int(10) unsigned NOT NULL,
  `id_product` int(10) unsigned NOT NULL,
  `link` varchar(512) NOT NULL,
  `date_add` datetime DEFAULT NULL,
  `date_upd` datetime DEFAULT NULL,
  PRIMARY KEY (`id_fpv_video_link`)
) ENGINE=@ENGINE@ DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;



