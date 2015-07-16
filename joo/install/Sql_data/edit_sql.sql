ALTER TABLE  `pin_item` ADD  `Model` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT  '型号' AFTER  `img` ,
ADD  `FocalLength` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT  '焦距' AFTER  `Model` ,
ADD  `ShutterSpeedValue` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT  '快门速度' AFTER  `FocalLength` ,
ADD  `ApertureValue` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT  '快门光圈' AFTER  `ShutterSpeedValue` ,
ADD  `ISOSpeedRatings` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT  'ISO感光度' AFTER  `ApertureValue` ,
ADD  `DateTimeOriginal` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT  '拍摄时间' AFTER  `ISOSpeedRatings` ;