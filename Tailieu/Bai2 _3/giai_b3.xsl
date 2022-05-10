<?xml version="1.0" encoding="UTF-8"?>
<xslt xmlns="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:template match="/">
        <html>
            <head>
                <title>Book catalog</title>
            </head>
            <body>
                <center>
                    <table border="2" cellpadding="5"> 
                        <tr>
                            <td align="center" bgcolor="sliver">
                                <b>ID</b>
                            </td>
                            <td align="center" bgcolor="sliver">
                                <b>Author</b>
                            </td>
                            <td align="center" bgcolor="sliver">
                                <b>Title</b>
                            </td>
                            <td align="center" bgcolor="sliver">
                                <b>Genre</b>
                            </td>
                            <td align="center" bgcolor="sliver">
                                <b>Price</b>
                            </td>
                            <td align="center" bgcolor="sliver">
                                <b>Published Date</b>
                            </td>
                            <td align="center" bgcolor="sliver">
                                <b>Descreption</b>
                            </td>
                        </tr>

            <xsl:for-each select="//book">
                <tr>
                    <td>
                        <xsl:value-of select="@id" />
                    </td>
                    <td>
                        <xsl:value-of select="@author" />
                    </td>
                    <td>
                        <xsl:choose>
                            <xsl:when test="self::*[genre = 'lap trinh']">
                                <xsl:attribute name="style">backgroundcolor:pink 
                                </xsl:attribute>
                            </xsl:when>
                            <xsl:when test="self::*[genre = 'Tin hoc']">
                                <xsl:attribute name="style">backgroundcolor:lightblue 
                                </xsl:attribute>
                            </xsl:when>
                            <xsl:otherwise>
                                <xsl:attribute name="style">backgroundcolor:lightgreen 
                                </xsl:attribute>
                            </xsl:otherwise>
                        </xsl:choose>
                        <xsl:value-of select="title" />
                    </td>
                    <td>
                        <xsl:value-of select="genre" />
                    </td>
                    <td>
                        <xsl:if test="price > 6">
                            <xsl:attribute name="bgcolor">cyan
                            </xsl:attribute>
                        </xsl:if>
                        <xsl:value-of select="price" />
                    </td>
                    <td>
                        <xsl:value-of select="published_date" />
                    </td>
                    <td>
                        <xsl:value-of select="description" />
                    </td>
                    </xsl:for-each>
                    </table>
                </center>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
