��    �      �  �   |	      �  D   �          )  u   ;  �   �  �   4  "   �  �     5  �  �   �     �     �     �     �  G   �  	   4     >  �   E  A   �  B   .  �   q          &     ;  �   C  
   �     �  
   �  &   
     1     =  9   N     �     �     �  
   �     �     �     �  p   �  \   d     �     �  g   �     Y     f      o  5   �     �  )   �  9     9   B     |  -   �     �     �     �  �   �  %   k     �     �  O   �       <    
   E     P     a  !   r  )   �  �   �  N   B     �  S   �     �     �       '   $     L  �   ^     �       W   !  "   y  E   �     �     �  >   �     1  	   7     A     Y  	   l  .   v     �     �  #   �  7   �     (      -   a   5      �      �      �      �   :   �      	!  H   !  7   h!  D   �!  9   �!  l   "     �"  
   �"     �"     �"  W   �"  ~   "#     �#  U   �#     �#    $     .%  (   L%  5   u%  v   �%  :   "&     ]&  	   u&     &     �&  &   �&     �&  �   �&  �   w'  %   !(  %   G(     m(     |(     �(     �(  >   �(     �(     �(  �   )     �)  �  �)  +   �+  c   �+  �   ,  �   �,  D   �-     �-     �-  u   .  �   }.  �    /  "   �/  �   �/  ;  0  �   �1     2     �2     �2     �2  D   �2  	   3     3  �   3  A   �3  B   �3  �   @4     �4     �4     
5  �   5  	   �5     �5  
   �5  &   �5     �5     6  L   6     i6     r6     6  
   �6     �6     �6      �6  p   �6  \   I7     �7     �7  g   �7     >8     K8      ]8  5   ~8     �8  )   �8  =   �8  9   49     n9  -   �9     �9     �9     �9  �   �9  %   ]:     �:     �:  O   �:     �:  <  �:  
   7<     B<     S<  !   d<  !   �<  �   �<  N   ,=     {=  S   �=     �=     �=     �=  '   >     6>  �   H>     �>     �>  U   ?     [?  E   m?     �?     �?  >   �?     @  	   @     @     *@  	   =@  .   G@     v@     �@  #   �@  7   �@     �@     �@  a   A     hA     tA     }A     �A  :   �A  '   �A  H   �A  ?   DB  f   �B  8   �B  l   $C     �C  
   �C     �C     �C  W   �C  ~    D     �D  U   �D     �D    E     ,F  (   JF  5   sF  v   �F  :    G     [G  	   sG     }G     �G  &   �G     �G  �   �G  �   uH  %   I  %   EI     kI     zI     �I     �I  >   �I     �I     �I  �    J     �J  �  �J  +   {L  c   �L  �   M     N                              3   X           �   l      <       y   �   w       �       |   u   V   B       -   q   P       C   &   `           :   '   x   v          +       �   �   ;   e   !   n       I   6   /   "          �   S       7   z   c   }   �       d   R      =   U                    5              #              @          j              �      �       �           h   W       M              �   $   �       2   *          g   t   a       k   4   {              H       K   f   o   E   Z   ]   8   m           Q   	       b   )   F   Y   _          �   �   ?   �          D   �      ^                  s       �   
   r   (       �   �       �              T   J   p             ,   �       9   A   1       %       i   .   �         �   [   L   >             0   ~   O   \              G       %1$s /path/to/the/wordpress/root/varnishstat.json # every 3 minutes. %s is purged successfully. /varnishstat.json /varnishstat/server1_3389398cd359cfa443f85ca040da069a.json,/varnishstat/server2_3389398cd359cfa443f85ca040da069a.json <a href="%1$s">Performance Cache</a> automatically purges your posts when published or updated. Sometimes you need a manual flush. <strong>Long story</strong><br />On every Varnish Cache server setup a cronjob that generates the JSON stats file :<br /> %1$s /path/to/be/set/filename.json # every 3 minutes. <strong>Managed WordPress</strong> <strong>Short story</strong><br />You must generate by cronjob the JSON stats file. The generated files must be copied on the backend servers in the wordpress root folder. A content delivery network is a system of distributed servers that deliver pages and other web content to a user, <br/>based on the geographic locations of the user, the origin of the webpage and the content delivery server. <br>This is especially useful if you have a lot of visitors spread across the globe. A custom URL or permalink structure is required for the Performance Cache plugin to work correctly. Please go to the <a href="options-permalink.php">Permalinks Options Page</a> to configure them. ACLs Allow one.com to collect data. Backends CDN state updated CDN will not work for logged-in users until development mode is active. Cache TTL Cancel Comma separated hostnames. Varnish uses the hostname to create the cache hash. For each IP, you must set a hostname.<br />Use this option if you use multiple domains. Comma separated ip/ip range. Example : 192.168.0.2,192.168.1.1/24 Comma separated ip/ip:port. Example : 192.168.0.2,192.168.0.3:8080 Comma separated relative URLs. One for each IP. <a href="%1$s/wp-admin/index.php?page=vcaching-plugin&tab=stats&info=1">Click here</a> for more info on how to set this up. Comments Connection timed out Console Copy the files on the backend servers in /path/to/wordpress/root/varnishstat/ folder. Then fill in the relative path to the files in Statistics JSONs on the Settings tab : Counts of  Days Deactivate Deactivated the One.com Varnish plugin Description Development mode Development mode will get disabled after entered duration Download Dynamic host Enable Enable CDN Enable Performance Cache Enable debug End development mode (hours) Example 1 <br />If you have a single server, both Varnish Cache and the backend on it, use the folowing cronjob: Example 2 <br />You have 2 Varnish Cache Servers, and 3 backend servers. Setup the cronjob : Exclude from CDN Fetching stats for server %1$s For delivering best customer experience, one.com wants to collect non-sensitive data from your website. Free upgrade Generate Get access to our Premium themes Get better performance with Performance Cache and CDN Get configuration files Get helpful tips with Advanced Error Page Get notified about security with Vulnerability Monitoring Hello, We've deactivated the One.com Varnish plugin from  Homepage cache TTL Host on our WordPress servers built for speed Hosts Hours IPs If you cannot enable the ZIP extension, please use the provided Varnish Cache configuration files located in /wp-content/plugins/vcaching/varnish-conf folder Increase your authentication security Installed plugins Installed themes It seems that %s is already purged. There is no resource in the cache to purge. Key Key used to purge Varnish cache. It is sent to Varnish as X-VC-Purge-Key header. Use a SHA-256 hash.<br />If you can't use ACL's, use this option. You can set the `purge key` in lib/purge.vcl.<br />Search the default value ff93c3cb929cee86901c7eefc8088e9511c005492c6502a930360c02221cf8f4 to find where to replace it. Learn more Logged in cookie Maintenance Mode Make your WordPress more powerful Make your website even more powerful with Make your website faster with Performance Cache Pro by saving a cached copy of it. With the Pro version, you get more optimization. Make your website faster with Performance Cache by saving a cached copy of it. Minutes Not required. If filled in overrides default TTL of %s seconds. 0 means no caching. One.com One.com performance tools Override default TTL Override default TTL on each post/page. Performance Cache Performance Cache requires you to use custom permalinks. Please go to the <a href="options-permalink.php">Permalinks Options Page</a> to configure them. Performance Cache&nbsp; Performance Tools Performance cache is purged automatically when a post or page is published or modified. Performance cache settings updated Performance cache works with domains which are hosted on %sone.com%s. Plugins Premium Press the button below to force it to purge your entire cache. Purge Purge CDN Purge Performance Cache Purge from Varnish Purge key Purge menu related pages when a menu is saved. Purge on save menu Purge one.com cache Quick fix or ignore recommendations Relative URL to purge. Example : /wp-content/uploads/.* Save Seconds Send all debugging headers to the client. Also shows complete response from Varnish on purge all. Server %1$s Settings Settings saved. Setup information Some error occurred, please reload the page and try again. Something went wrong! Sorry, no compatible themes found for your version of WordPress and PHP. Specify files and folders to be excluded (one per line) Specify files and folders you wish to exclude from CDN. For example: Speed up your website with fast content delivery network. Spend less time worrying about your site and more time growing your business with one.com Managed WordPress. Staging exists Statistics Statistics JSONs Stats generated on The generated files must be copied on the backend servers in the wordpress root folder. The time that website data is stored in the Varnish cache. After the TTL expires the data will be updated, 0 means no caching. Themes Then fill in the relative path to the files in Statistics JSONs on the Settings tab : This is a Premium Theme This module sets a special cookie to tell Varnish that the user is logged in. Use a SHA-256 hash. You can set the `logged in cookie` in default.vcl.<br />Search the default value <i>flxn34napje9kwbwr4bjwz5miiv9dhgj87dct4ep0x3arr7ldif73ovpxcgm88vs</i> to find where to replace it. Time to live in Varnish cache Time to live in seconds in Varnish cache Time to live in seconds in Varnish cache for homepage To get the best out of One.com Performance Cache, kindly deactivate the existing "Varnish Caching" plugin.&nbsp;&nbsp; Truncate message activated. Showing only first 3 messages. Truncate notice message Try again Trying to purge URL :  URL Use SSL (https://) for purge requests. Use SSL on purge requests Use a different filename for each Varnish Cache server. After this is done, fill in the relative path to the files in Statistics JSONs on the Settings tab. Uses the $_SERVER['HTTP_HOST'] as hash for Varnish. This means the purge cache action will work on the domain you're on.<br />Use this option if you use only one domain. VC Server 1 : %1$s # every 3 minutes. VC Server 2 : %1$s # every 3 minutes. VCLs Generator Value Varnish Cache version Varnish configuration Varnish environment not present for Performance cache to work. Version View details When using multiple Varnish Cache servers, VCaching shows too many `Trying to purge URL` messages. Check this option to truncate that message. Which data? With One.com Performance Cache enabled your website loads a lot faster. We save a cached copy of your website on a Varnish server, that will then be served to your next visitors. <br/>This is especially useful if you have a lot of visitors. It may also help to improve your SEO ranking. If you would like to learn more, please read our help article: <a href="https://help.one.com/hc/en-us/articles/360000080458" target="_blank">How to use the One.com Performance Cache for WordPress</a>. You cannot download the configuration files You do not have permission to purge the cache for the whole site. Please contact your adminstrator. You server's PHP configuration is missing the ZIP extension (ZipArchive class is used by VCaching). Please enable the ZIP extension. For more information click <a href="%1$s" target="_blank">here</a>. Language: en_US
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
Plural-Forms: nplurals=2; plural=(n != 1);
X-Generator: Phrase (phrase.com)
 %1$s /path/to/the/wordpress/root/varnishstat.json # every 3 minutes. %s is purged successfully. /varnishstat.json /varnishstat/server1_3389398cd359cfa443f85ca040da069a.json,/varnishstat/server2_3389398cd359cfa443f85ca040da069a.json <a href="%1$s">Performance Cache</a> automatically purges your posts when published or updated. Sometimes you need a manual flush. <strong>Long story</strong><br />On every Varnish Cache server setup a cronjob that generates the JSON stats file :<br /> %1$s /path/to/be/set/filename.json # every 3 minutes. <strong>Managed WordPress</strong> <strong>Short story</strong><br />You must generate by cronjob the JSON stats file. The generated files must be copied on the backend servers in the wordpress root folder. A content delivery network (CDN) is a system of distributed servers that deliver pages and other web content to a user, <br/>based on the geographic locations of the user, the origin of the webpage and the content delivery server. <br>This is especially useful if you have a lot of visitors spread across the globe. A custom URL or permalink structure is required for the Performance Cache plugin to work correctly. Please go to the <a href="options-permalink.php">Permalinks Options Page</a> to configure them. ACLs Allow one.com to collect data. Backends  - Latest updates CDN is disabled for logged-in users when development mode is active. Cache TTL Cancel Comma separated hostnames. Varnish uses the hostname to create the cache hash. For each IP, you must set a hostname.<br />Use this option if you use multiple domains. Comma separated ip/ip range. Example : 192.168.0.2,192.168.1.1/24 Comma separated ip/ip:port. Example : 192.168.0.2,192.168.0.3:8080 Comma separated relative URLs. One for each IP. <a href="%1$s/wp-admin/index.php?page=vcaching-plugin&tab=stats&info=1">Click here</a> for more info on how to set this up. Comments Connection timed out Console Copy the files on the backend servers in /path/to/wordpress/root/varnishstat/ folder. Then fill in the relative path to the files in Statistics JSONs on the Settings tab : Number of Days Deactivate Deactivated the one.com Varnish plugin Description Development mode Development mode will automatically be disabled after the time entered here. Download Dynamic host Enable Enable CDN Enable Performance Cache Enable debug Disable development mode (hours) Example 1 <br />If you have a single server, both Varnish Cache and the backend on it, use the folowing cronjob: Example 2 <br />You have 2 Varnish Cache Servers, and 3 backend servers. Setup the cronjob : Exclude from CDN Fetching stats for server %1$s To deliver the best customer experience, one.com wants to collect non-sensitive data from your website. Free upgrade Generate password Get access to our Premium themes Get better performance with Performance Cache and CDN Get configuration files Get helpful tips with Advanced Error Page Get notified about security issues with Vulnerability Monitor Hello, We've deactivated the one.com Varnish plugin from  Homepage cache TTL Host on our WordPress servers built for speed Hosts Hours IPs If you cannot enable the ZIP extension, please use the provided Varnish Cache configuration files located in /wp-content/plugins/vcaching/varnish-conf folder Increase your authentication security Installing plugin Installing theme It seems that %s is already purged. There is no resource in the cache to purge. Key Key used to purge Varnish cache. It is sent to Varnish as X-VC-Purge-Key header. Use a SHA-256 hash.<br />If you can't use ACL's, use this option. You can set the `purge key` in lib/purge.vcl.<br />Search the default value ff93c3cb929cee86901c7eefc8088e9511c005492c6502a930360c02221cf8f4 to find where to replace it. Learn more Logged in cookie Maintenance Mode Make your WordPress more powerful Make your WordPress more powerful Make your website faster with Performance Cache Pro by saving a cached copy of it. With the Pro version, you get more optimization. Make your website faster with Performance Cache by saving a cached copy of it. Minutes Not required. If filled in overrides default TTL of %s seconds. 0 means no caching. one.com one.com performance tools Override default TTL Override default TTL on each post/page. Performance Cache Performance Cache requires you to use custom permalinks. Please go to the <a href="options-permalink.php">Permalinks Options Page</a> to configure them. Performance Cache Performance Tools Performance Cache is purged automatically when a post or page is published or edited. Performance Cache Performance cache works with domains which are hosted on %sone.com%s. Plugins Premium Press the button below to force it to purge your entire cache. Purge Purge CDN Purge Performance Cache Purge from Varnish Purge key Purge menu related pages when a menu is saved. Purge on save menu Purge one.com cache Quick fix or ignore recommendations Relative URL to purge. Example : /wp-content/uploads/.* Save Seconds Send all debugging headers to the client. Also shows complete response from Varnish on purge all. Server %1$s Settings Settings Setup information Some error occurred, please reload the page and try again. Something went wrong! Please try again! Sorry, no compatible themes found for your version of WordPress and PHP. Enter files and folders to be excluded from CDN (one per line): Enter files, file extensions and folders (directories) that you want to exclude from CDN, for example: Speed up your website with fast content delivery network Spend less time worrying about your site and more time growing your business with one.com Managed WordPress. Staging Statistics Statistics JSONs Stats generated on The generated files must be copied on the backend servers in the wordpress root folder. The time that website data is stored in the Varnish cache. After the TTL expires the data will be updated, 0 means no caching. Themes Then fill in the relative path to the files in Statistics JSONs on the Settings tab : This is a Premium Theme This module sets a special cookie to tell Varnish that the user is logged in. Use a SHA-256 hash. You can set the `logged in cookie` in default.vcl.<br />Search the default value <i>flxn34napje9kwbwr4bjwz5miiv9dhgj87dct4ep0x3arr7ldif73ovpxcgm88vs</i> to find where to replace it. Time-to-live in Varnish cache Time to live in seconds in Varnish cache Time to live in seconds in Varnish cache for homepage To get the best out of one.com Performance Cache, kindly deactivate the existing "Varnish Caching" plugin.&nbsp;&nbsp; Truncate message activated. Showing only first 3 messages. Truncate notice message Try again Trying to purge URL :  URL Use SSL (https://) for purge requests. Use SSL on purge requests Use a different filename for each Varnish Cache server. After this is done, fill in the relative path to the files in Statistics JSONs on the Settings tab. Uses the $_SERVER['HTTP_HOST'] as hash for Varnish. This means the purge cache action will work on the domain you're on.<br />Use this option if you use only one domain. VC Server 1 : %1$s # every 3 minutes. VC Server 2 : %1$s # every 3 minutes. VCLs Generator Value Varnish Cache version Varnish configuration Varnish environment not present for Performance cache to work. Version View details When using multiple Varnish Cache servers, VCaching shows too many `Trying to purge URL` messages. Check this option to truncate that message. Which data? With one.com Performance Cache enabled your website loads a lot faster. We save a cached copy of your website on a Varnish server, that will then be served to your next visitors. <br/>This is especially useful if you have a lot of visitors. It may also help to improve your SEO ranking. If you would like to learn more, please read our help article: <a href="https://help.one.com/hc/en-us/articles/360000080458" target="_blank">How to use the Performance Cache for WordPress</a>. You cannot download the configuration files You do not have permission to purge the cache for the whole site. Please contact your adminstrator. You server's PHP configuration is missing the ZIP extension (ZipArchive class is used by VCaching). Please enable the ZIP extension. For more information click <a href="%1$s" target="_blank">here</a>. 