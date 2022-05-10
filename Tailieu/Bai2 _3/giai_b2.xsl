<?xml version="1.0">
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="http://www.w3.org/2001" > 
<xsl:output method="xml" />
<xsl:template match="/">
    <html>
        <body>
        <div align="center">
            Bang gia thue phong <br/>
            <xsl:apply-template/>
        </div>
        </body>
    </html>
</xsl:template>

<xsl:template match="KHACH_SAN">
    <table border="2">
        <tr>
            <TD>Loai phong</TD>
            <TD>Gia thue</TD>
        </tr>
        <xsl:apply-templates/>
    </table>
</xsl:template>

<xsl:template match="LOAI_PHONG">
    <tr>
        <TD><xsl:value-of select="@ten"/></TD>
        <TD><xsl:value-of select="@Don_gia"/></TD>
    </tr>
</xsl:template>
</xsl:stylesheet>