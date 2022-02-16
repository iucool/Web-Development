<%@ LANGUAGE = JScript %>
<%
  // Set the source and style sheet locations here.
  var sourceFile = Server.MapPath("simple.xml");
  var styleFile = Server.MapPath("simple.xsl");
  
  // Load the XML.
  var source = Server.CreateObject("Msxml2.DOMDocument.6.0");
  source.async = false;
  source.load(sourceFile);

  // Load the XSLT.
  var style = Server.CreateObject("Msxml2.DOMDocument.6.0");
  style.async = false;
  style.load(styleFile);
  Response.Write(source.transformNode(style));
%>