function randomquote() {
	var howMany = 7
	var quote = new Array(howMany)
	quote[0]="����������� ���� � ��� �������� 1.56 ���. �������."
	quote[1]="��������� ���� � ��� ��� ������� 246 �."
	quote[2]="�������� ���� � ��� ��� ������ 31 �."
	quote[3]="��������� ���� � ��� �������� �� ������ ������."
	quote[4]="������ ���� � ��� �`������ � ���볿."
	quote[5]="��������� � ��� ���� ����� ����� 50 �."
	quote[6]="���������� ���� � ��� � ���������."
	var quo = parseInt(Math.random() *  7)
	quox = quote[quo]
	document.write(quox)
}