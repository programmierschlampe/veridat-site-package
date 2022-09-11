#
# Table structure for extension 
#

CREATE TABLE pages (
	contactform smallint(5) DEFAULT '0',
); 

CREATE TABLE tt_content (
    backgroundimage int(11) unsigned NOT NULL DEFAULT '0',
    selected_valuerows int(11) unsigned NOT NULL DEFAULT '0',
    selected_carouselitems int(11) unsigned NOT NULL DEFAULT '0',
);

CREATE TABLE tx_veridat_domain_model_valuerow (
    uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,
    parentid int(11) DEFAULT '0' NOT NULL,

    selected_valueboxes int(11) unsigned DEFAULT '0' NOT NULL,

    sorting_foreign int(11) DEFAULT '0' NOT NULL,
    hidden smallint(5) unsigned DEFAULT '0' NOT NULL,
    deleted tinyint(4) unsigned DEFAULT 0 NOT NULL,

    PRIMARY KEY (uid),
    KEY parent (pid),
    KEY rowparent (parentid)
);

CREATE TABLE tx_veridat_domain_model_valuebox (
    uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,
    parentid int(11) DEFAULT '0' NOT NULL,

	header varchar(255) DEFAULT '' NOT NULL,
    subheader varchar(255) DEFAULT '' NOT NULL,
	image int(11) unsigned DEFAULT '0' NOT NULL,

    sorting_foreign int(11) DEFAULT '0' NOT NULL,
    hidden smallint(5) unsigned DEFAULT '0' NOT NULL,
    deleted tinyint(4) unsigned DEFAULT 0 NOT NULL,

    PRIMARY KEY (uid),
    KEY parent (pid),
    KEY boxparent (parentid)
);

CREATE TABLE tx_veridat_domain_model_carouselitem (
    uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
    pid int(11) DEFAULT '0' NOT NULL,
    parentid int(11) DEFAULT '0' NOT NULL,

	header varchar(255) DEFAULT '' NOT NULL,
    subheader varchar(255) DEFAULT '' NOT NULL,
  	bodytext mediumtext,
	image int(11) unsigned DEFAULT '0' NOT NULL,

    sorting_foreign int(11) DEFAULT '0' NOT NULL,
    hidden smallint(5) unsigned DEFAULT '0' NOT NULL,
    deleted tinyint(4) unsigned DEFAULT 0 NOT NULL,

    PRIMARY KEY (uid),
    KEY parent (pid),
    KEY itemparent (parentid)
);