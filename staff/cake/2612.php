<?php include ('header.php');?>
<?php include ('date.php');?>
<div id="content">
<div id="title">1898 ��</div>
<p><?php
$string='ϒ���� � ���� ��� ������� ������������ ������� ����.';
$length=strlen($string);
echo $string;
?></p>
</div>
<div id="content">
<div id="title">1963 ��</div>
<p><?php
$string='Գ��� ���������� �Capitol Records� ��������� ������ � ��� ����� ����� The Beatles �I Want to Hold Your Hand/I Saw Her Standing There�, ���� 1 ������ ���������� ���� ������ �� ����� ���� � �������������� ���-�����, �������� ����������� ����������� ������� � ���.';
$length=strlen($string);
$string=substr($string, 0, 139);
if ($length>140) echo $string.'�'; else echo $string;
?></p>
</div>
<div id="content">
<div id="title">2004 ��</div>
<p>³������ ������� ������������ ��������� � ������� �����. ������ � ���������� �����, �� ���� �� ������� ѳ�����.</p>
</div>
<div id="content">
<div id="title">2004 ��</div>
<p>� ����� ��������� ��������������� ������� ���� 26 ������ 2004, �� ����� �������� ������ ³���� ������</p>

</div>
</body>
</html>
