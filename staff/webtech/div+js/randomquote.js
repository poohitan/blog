function randomquote() {
	var howMany = 7
	var quote = new Array(howMany)
	quote[0]="Найдорожчий торт у світі коштував 1.56 млн. долларів."
	quote[1]="Найдовший торт у світі мав довжину 246 м."
	quote[2]="Найвищий торт у світі мав висоту 31 м."
	quote[3]="Найменший торт у світі поміщався на кінчику пальця."
	quote[4]="Перший торт у світі з`явився в Італії."
	quote[5]="Найважчий у світі торт важив понад 50 т."
	quote[6]="Найвідоміший торт у світі — «Наполеон»."
	var quo = parseInt(Math.random() *  7)
	quox = quote[quo]
	document.write(quox)
}