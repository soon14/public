<?php /* -- enphp : https://git.oschina.net/mz/mzphp2 */ error_reporting(E_ALL^E_NOTICE);define('���', '�');�������÷�����������������񵙉��܄���Ɏ��ʋ��گ�ر���ל���ȩɦ�����˘���������등ï������;$_GET[���] = explode('|||', gzinflate(substr('�      ]��
�0������PA��6[�iӥ�c�ël�)�s��8EX�`d�.t����.�}s�T��]��`o�M]}]�jH(<������a���,֐�q�B��S�Ii�k�(���+�1-��S���� cA�����H��[.J����@�� I�0  ',0x0a, -8)));ҩ�Ӷ�����ۣȈ��얻��ꐫ�ʦ�������ү��������もИ��򩀞����������ɽ����͘��������ȑ�獈;
$_GET{���}[0](0);require_once($_GET{���}{0x001});require_once($_GET{���}[0x0002]);if($_SESSION[$_GET{���}{0x00003}]==$_GET{���}[0x000004] ||$_SESSION[$_GET{���}{0x05}]==$_GET{���}[0x000004]){$_GET{���}[0x006]($_GET{���}{0x0007});$_GET{���}[0x00008]();}$result=$_GET{���}{0x000009}($sql);$amount=$_GET{���}[0x0a]($result);if($_GET{���}{0x00b}($_GET{���}[0x000c](isset($_GET[$_GET{���}{0x0000d}])))&& $_GET{���}{0x00b}($_GET{���}[0x000c]($_GET[$_GET{���}{0x0000d}]))!=$_GET{���}[0x00000e]){$page=$_GET{���}{0x00b}($_GET{���}[0x000c]($_GET{���}{0x0f}($_GET[$_GET{���}{0x0000d}])));}else{$page=0x001;}$page_size=0x0a;$_GET[$_GET{���}[0x0010]]=$_GET{���}{0x00b}($_GET{���}[0x000c](isset($_GET[$_GET{���}[0x0010]])))?$_GET{���}{0x00b}($_GET{���}[0x000c]($_GET[$_GET{���}[0x0010]])):$_GET{���}[0x00000e];$_GET[$_GET{���}{0x00011}]=$_GET{���}{0x00b}($_GET{���}[0x000c](isset($_GET[$_GET{���}{0x00011}])))?$_GET{���}{0x00b}($_GET{���}[0x000c]($_GET[$_GET{���}{0x00011}])):$_GET{���}[0x00000e];switch($_GET{���}{0x00b}($_GET{���}[0x000c]($_GET[$_GET{���}[0x0010]]))){default:$sql="select * from ewmzu where appid='$appid' order by money asc ";$result=$_GET{���}{0x000009}($sql);$amount=$_GET{���}[0x0a]($result);$sql="select * from ewmzu where appid='$appid' ORDER BY money asc limit ".($page-0x001)*$page_size.", $page_size";$info_page=$_GET{���}[0x000012];break;}$result=$_GET{���}{0x000009}($sql);?>