# Krux Tags README

This module is designed to add Krux Tags (http://www.krux.com) to the site.

Default values for distribution can be placed in: config/install/krux_tags.settings.yml 
and config/schema/krux_tags.schema.yml

The configuration screen is under Search and Metadata `admin/config/search/krux_tags` or via the modules 
screen under "Configuration" at the Krux Tags module.

After setting the values, the tag will display in the "page_bottom" region. 
Example below.
```javascript
<script class="kxct" data-id="asdfhjkl" data-timing="async" data-version="3.0"
type="text/javascript">
  window.Krux||((Krux=function(){Krux.q.push(arguments)}).q=[]);
  (function(){
    var
k=document.createElement('script');k.type='text/javascript';k.async=true;
   
k.src=(location.protocol==='https:'?'https:':'http:')+'//cdn.krxd.net/controltag/asdfhjkl.js';
    var
s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(k,s);
  }());
</script>
<!-- END Krux ControlTag -->
```
