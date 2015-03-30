function rollOver(imgName, set)
{
	ButName = "link_" + imgName;
	if (set == 1) ButSrc = ButName + "_on.gif";
	else ButSrc = ButName + "_off.gif";
	document.getElementById(ButName).src = "/images/" + ButSrc;
}