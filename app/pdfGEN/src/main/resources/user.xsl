<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:s="http://www.stylusstudio.com/xquery">
    <xsl:template match="/">
        <fo:root xmlns:fo="http://www.w3.org/1999/XSL/Format">
            <fo:layout-master-set>
                <fo:simple-page-master master-name="default-page" page-height="3.8in" page-width="7.5in" margin-left="0.6in" margin-right="0.6in" margin-top="0.79in" margin-bottom="0.79in">
                    <fo:region-body/>
                </fo:simple-page-master>
            </fo:layout-master-set>
            <fo:page-sequence master-reference="default-page">
                <fo:flow flow-name="xsl-region-body">
                    <fo:block>
                        <fo:block text-align="center">
                            <fo:block>
                                <fo:table width="100%" border-style="outset" border-width="0pt" background-repeat="repeat">
                                    <fo:table-column/>
                                    <fo:table-column/>
                                    <fo:table-column/>
                                    <fo:table-body>
                                        <fo:table-row>
                                            <fo:table-cell border-style="inset" border-width="2pt" padding="2pt" background-repeat="repeat" display-align="center">
                                                <fo:block/>
                                            </fo:table-cell>
                                            <fo:table-cell border-style="inset" border-width="2pt" padding="2pt" background-repeat="repeat" display-align="center">
                                                <fo:block text-align="center">
                                                    <fo:block>
                                                        <fo:inline font-size="14pt" font-weight="bold">
                                                            <xsl:text>ECOMMERCE XML</xsl:text>
                                                        </fo:inline>
                                                    </fo:block>
                                                </fo:block>
                                            </fo:table-cell>
                                            <fo:table-cell border-style="inset" border-width="2pt" padding="2pt" background-repeat="repeat" display-align="center">
                                                <fo:block/>
                                            </fo:table-cell>
                                        </fo:table-row>
                                    </fo:table-body>
                                </fo:table>
                            </fo:block>
                            <fo:block>
                                <xsl:text>&#xA0;</xsl:text>
                            </fo:block>
                            <fo:block>
                                <fo:inline font-size="12pt" font-weight="bold" color="#0000FF">
                                    <xsl:text>Customer Card</xsl:text>
                                </fo:inline>
                            </fo:block>
                            <fo:block>
                                <xsl:text>&#xA0;</xsl:text>
                            </fo:block>
                            <fo:block>
                                <fo:inline font-weight="bold" color="#FF0000">
                                    <fo:table width="100%" border-style="outset" border-width="2pt" background-repeat="repeat">
                                        <fo:table-column/>
                                        <fo:table-column/>
                                        <fo:table-body>
                                            <fo:table-row>
                                                <fo:table-cell border-style="inset" border-width="0pt" padding="2pt" background-repeat="repeat" display-align="center">
                                                    <fo:block>
                                                        <fo:inline color="#000000">
                                                            <xsl:text>Name:</xsl:text>
                                                        </fo:inline>
                                                    </fo:block>
                                                </fo:table-cell>
                                                <fo:table-cell border-style="inset" border-width="0pt" padding="2pt" background-repeat="repeat" display-align="center">
                                                    <fo:block>
                                                        <fo:inline font-weight="normal" color="#000000">&#xA0;&#xA0;
                                                            <xsl:value-of select="/user/firstName"/>&#xA0;&#xA0;
                                                            <xsl:value-of select="/user/lastName"/>
                                                        </fo:inline>
                                                    </fo:block>
                                                </fo:table-cell>
                                            </fo:table-row>
                                            <fo:table-row>
                                                <fo:table-cell border-style="inset" border-width="0pt" padding="2pt" background-repeat="repeat" display-align="center">
                                                    <fo:block>
                                                        <fo:inline color="#000000">
                                                            <xsl:text>Member Since:</xsl:text>
                                                        </fo:inline>
                                                    </fo:block>
                                                </fo:table-cell>
                                                <fo:table-cell border-style="inset" border-width="0pt" padding="2pt" background-repeat="repeat" display-align="center">
                                                    <fo:block>
                                                        <fo:inline font-weight="normal">
                                                            <xsl:text>&#xA0;&#xA0;</xsl:text>
                                                        </fo:inline>
                                                        <fo:inline font-weight="normal" color="#000000">
                                                            <xsl:value-of select="/user/createdAt"/>
                                                        </fo:inline>
                                                    </fo:block>
                                                </fo:table-cell>
                                            </fo:table-row>
                                            <fo:table-row>
                                                <fo:table-cell border-style="inset" border-width="0pt" padding="2pt" background-repeat="repeat" display-align="center">
                                                    <fo:block>
                                                        <fo:inline color="#000000">
                                                            <xsl:text>email:</xsl:text>
                                                        </fo:inline>
                                                        <xsl:text> </xsl:text>
                                                    </fo:block>
                                                </fo:table-cell>
                                                <fo:table-cell border-style="inset" border-width="0pt" padding="2pt" background-repeat="repeat" display-align="center">
                                                    <fo:block>
                                                        <xsl:text>&#xA0;&#xA0;</xsl:text>
                                                        <fo:inline font-weight="normal" color="#000000">
                                                            <xsl:value-of select="/user/email"/>
                                                        </fo:inline>
                                                    </fo:block>
                                                </fo:table-cell>
                                            </fo:table-row>
                                            <fo:table-row>
                                                <fo:table-cell border-style="inset" border-width="0pt" padding="2pt" background-repeat="repeat" display-align="center">
                                                    <fo:block>
                                                        <fo:inline color="#000000">
                                                            <xsl:text>phone: </xsl:text>
                                                        </fo:inline>
                                                    </fo:block>
                                                </fo:table-cell>
                                                <fo:table-cell border-style="inset" border-width="0pt" padding="2pt" background-repeat="repeat" display-align="center">
                                                    <fo:block>
                                                        <xsl:text>&#xA0;&#xA0;</xsl:text>
                                                        <fo:inline font-weight="normal" color="#000000">
                                                            <xsl:text>+212</xsl:text>
                                                        </fo:inline>
                                                        <xsl:text> </xsl:text>
                                                        <fo:inline font-weight="normal" color="#000000">
                                                            <xsl:value-of select="/user/phone"/>
                                                        </fo:inline>
                                                    </fo:block>
                                                </fo:table-cell>
                                            </fo:table-row>
                                        </fo:table-body>
                                    </fo:table>
                                </fo:inline>
                            </fo:block>
                        </fo:block>
                    </fo:block>
                </fo:flow>
            </fo:page-sequence>
        </fo:root>
    </xsl:template>
</xsl:stylesheet>