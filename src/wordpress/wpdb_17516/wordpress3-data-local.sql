/*--
-- Define the Admin User 
--
*/

LOCK TABLES `wp_users` WRITE;
INSERT INTO `wp_users` VALUES (1,'admin','**unbreakable**','admin','&Info_ClusterContact;',','',','&Wordpress_PressDate;','',0,'admin');
UNLOCK TABLES;


/*---
---  Define Basic Link Categories 
--- */

LOCK TABLES `wp_terms` WRITE;
INSERT INTO `wp_terms` VALUES 
(1,'Uncategorized','uncategorized',0),
(2,'Cluster Links','clusterlinks',0);
UNLOCK TABLES;


/*---
--- Define the Basic Links
---*/

LOCK TABLES `wp_links` WRITE;
INSERT INTO wp_links( link_id, link_url, link_name, link_description, link_notes)
VALUES (101,'/ganglia','Monitor Your Cluster','Ganglia Cluster Monitoring',''),
(102,'/tripwire','Tripwire','Tripwire System Intrusion Detection',''),
(103,'/misc/dot-graph.php?size=45,45','Kickstart Graph','What\'s in your cluster?',''),
(104,'/roll-documentation','Roll Documentation','User Guides for Installed Rolls','');
UNLOCK TABLES;

/*---
--- Create semantic equality between links above and categories
--- (link_id, wp_terms) (link id#) is a (wp_term #)
---*/
LOCK TABLES `wp_term_relationships` WRITE;
INSERT INTO `wp_term_relationships` VALUES 
(101,2,0),
(102,2,0),
(103,2,0),
(104,2,0),
(1,1,0);
UNLOCK TABLES;

/*--
-- Create Posts and Misc-admin page 
-- */

LOCK TABLES `wp_posts` WRITE;
INSERT INTO `wp_posts` VALUES 
(1,1,'&Wordpress_PressDate;','&Wordpress_PressDate;','<a title=\"Rocks Web Site\" href=\"http://www.rocksclusters.org\"><img class=\"alignleft\" src=\"/wordpress/wp-content/themes/twentyten/images/Rocks-logo-small.jpg\" alt=\"\" width=\"40\" height=\"40\" /></a>&hostname;.&Kickstart_PublicDNSDomain; successfully installed! Please <a href=\"http://www.rocksclusters.org/rocks-register/insert.php\">register</a> your cluster! Rocks is supported by the National Science Foundation under Grants <a href=\"http://www.nsf.gov/awardsearch/showAward.do?AwardNumber=1032778\">OCI-1032778</a> and <a href=\"http://www.nsf.gov/awardsearch/showAward.do?AwardNumber=0721623\">OCI-0721623</a>.','Cluster Installed','','publish','open','open','','hello-world','','','&Wordpress_PressDate;','&Wordpress_PressDate;','',0,'http://&hostname;.&Kickstart_PublicDNSDomain;/wordpress/?p=1',0,'post','',0),
(2,1,'&Wordpress_PressDate;','0000-00-00 00:00:00','Display Your Cluster&#8217;s Kickstart Graph\r\n\r\n	Small\r\n	Medium\r\n	Large\r\n','','','draft','open','open','','','','','&Wordpress_PressDate;','0000-00-00 00:00:00','',0,'http://&hostname;.&Kickstart_PublicDNSDomain;/wordpress/?p=2',1,'nav_menu_item','',0),
(3,1,'&Wordpress_PressDate;','&Wordpress_PressDate;','<strong>Display Your Cluster\'s Kickstart Graph</strong>\r\n<ul>\r\n	<li><a title=\"Small Kickstart Graph\" href=\"/misc/dot-graph.php?size=35,35\">Small</a></li>\r\n	<li><a href=\"/misc/dot-graph.php?size=45,45\">Medium</a></li>\r\n	<li><a href=\"/misc/dot-graph.php?size=55,55\">Large</a></li>\r\n</ul>','Miscellaneous Admin','','publish','open','open','','miscellaneous-admin','','','&Wordpress_PressDate;','&Wordpress_PressDate;','',0,'http://&hostname;.&Kickstart_PublicDNSDomain;/wordpress/?page_id=3',0,'page','',0);
UNLOCK TABLES;

/*---
--- Localize Options
--- */

LOCK TABLES `wp_options` WRITE;
INSERT INTO `wp_options`(`blog_id`,`option_name`,`option_value`,`autoload`) 
VALUES
(0,'siteurl','http://&hostname;.&Kickstart_PublicDNSDomain;/wordpress','yes'),
(0,'home','http://&hostname;.&Kickstart_PublicDNSDomain;/wordpress','yes'),
(0,'blogname','&hostname;.&Kickstart_PublicDNSDomain;','yes'),
(0,'blogdescription','Communicate with and Monitor Your Rocks Cluster','yes'),
(0,'widget_text','a:3:{i:2;a:0:{}i:3;a:3:{s:5:\"title\";s:14:\"Rocks Web Site\";s:4:\"text\";s:175:\"<img src=\"/wordpress/wp-content/themes/twentyten/images/Rocks-logo-small.jpg\" width=\"40\" height=\"40\" alt=\"\" /><a href=\"http://www.&Kickstart_PublicDNSDomain;/\">www.&Kickstart_PublicDNSDomain;</a>\";s:6:\"filter\";b:0;}s:12:\"_multiwidget\";i:1;}','yes'),
(0,'admin_email','&Info_ClusterContact;','yes'),
(0,'dashboard_widget_options','a:4:{s:25:\"dashboard_recent_comments\";a:1:{s:5:\"items\";i:5;}s:24:\"dashboard_incoming_links\";a:5:{s:4:\"home\";s:39:\"http://&hostname;.&Kickstart_PublicDNSDomain;/wordpress\";s:4:\"link\";s:115:\"http://blogsearch.google.com/blogsearch?scoring=d&partner=wordpress&q=link:http://&hostname;.&Kickstart_PublicDNSDomain;/wordpress/\";s:3:\"url\";s:148:\"http://blogsearch.google.com/blogsearch_feeds?scoring=d&ie=utf-8&num=10&output=rss&partner=wordpress&q=link:http://&hostname;.&Kickstart_PublicDNSDomain;/wordpress/\";s:5:\"items\";i:10;s:9:\"show_date\";b:0;}s:17:\"dashboard_primary\";a:7:{s:4:\"link\";s:26:\"http://wordpress.org/news/\";s:3:\"url\";s:31:\"http://wordpress.org/news/feed/\";s:5:\"title\";s:14:\"WordPress Blog\";s:5:\"items\";i:2;s:12:\"show_summary\";i:1;s:11:\"show_author\";i:0;s:9:\"show_date\";i:1;}s:19:\"dashboard_secondary\";a:7:{s:4:\"link\";s:28:\"http://planet.wordpress.org/\";s:3:\"url\";s:33:\"http://planet.wordpress.org/feed/\";s:5:\"title\";s:20:\"Other WordPress News\";s:5:\"items\";i:5;s:12:\"show_summary\";i:0;s:11:\"show_author\";i:0;s:9:\"show_date\";i:0;}}','yes'),
(0,'theme_mods_twentyten','a:2:{s:12:\"header_image\";s:92:\"http://&hostname;.&Kickstart_PublicDNSDomain;/wordpress/wp-content/themes/twentyten/images/headers/path.jpg\";s:18:\"nav_menu_locations\";s:0:\"\";}','yes');
UNLOCK TABLES;
