[debug]
debug = NO

[paginacion]
num_items = 100

[ajax]
num_items = 20

[mascaras]
m1 = "
<div class='form-group'>
    <label for="%name%"  class="control-label">%title% %seperator%</label>
    <div> %field% %help% %error% </div>
</div>
"
m2 = "
<div class='form-group'>
<table border="0">
<tr>
	<th class="control-label">%title% %seperator% </th>
	<th class="control-label" width="20%">&nbsp;</th>
	<th class="control-label">%title% %seperator% </th>
</tr>
<tr>
	<td>%field% %help% %error%</td>
	<td class="control-label" width="20%">&nbsp;</td>
	<td>%field% %help% %error%</td>
</tr>
</table>
"

[bd]
host  = localhost
login = root
clave = 12345678
bd	= casa_cambio
