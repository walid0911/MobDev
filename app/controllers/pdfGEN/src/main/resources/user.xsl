<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:s="http://www.stylusstudio.com/xquery">
    <xsl:template match="/">
        <fo:root xmlns:fo="http://www.w3.org/1999/XSL/Format">
            <fo:layout-master-set>
                <fo:simple-page-master master-name="default-page" page-height="2.555in" page-width="4.375in" margin-left="0.6in" margin-right="0.6in" margin-top="0.79in" margin-bottom="0.79in">
                    <fo:region-body/>
                </fo:simple-page-master>
            </fo:layout-master-set>
            <fo:page-sequence master-reference="default-page">
                <fo:flow flow-name="xsl-region-body">
                    <fo:block>
                        <fo:block text-align="center">
                            <fo:block>
                                <fo:inline font-size="14pt" font-weight="bold">
                                    <xsl:text>CustomerCard</xsl:text>
                                </fo:inline>
                            </fo:block>
                            <fo:block>
                                <fo:inline font-size="14pt" font-weight="bold">
                                    <fo:block font-size="14pt" font-weight="bold" text-align="left">
                                        <fo:block>
                                            <xsl:text>&#xA0;&#xA0; </xsl:text>
                                            <fo:inline font-size="10pt">
                                                <xsl:text>Name:&#xA0;&#xA0; </xsl:text>
                                            </fo:inline>
                                            <fo:inline font-size="10pt" font-weight="normal">
                                                <xsl:value-of select="/user/firstName"/>
                                            </fo:inline>
                                            <fo:inline font-size="10pt">
                                                <xsl:text> </xsl:text>
                                            </fo:inline>
                                            <fo:inline font-size="10pt" font-weight="normal">
                                                <xsl:value-of select="/user/lastName"/>
                                            </fo:inline>
                                        </fo:block>
                                        <fo:block>
                                            <fo:inline font-size="10pt">
                                                <xsl:text>&#xA0;&#xA0; Emal: </xsl:text>
                                            </fo:inline>
                                            <fo:inline font-size="10pt" font-weight="normal">
                                                <xsl:value-of select="/user/email"/>
                                            </fo:inline>
                                        </fo:block>
                                        <fo:block>
                                            <fo:inline font-size="10pt" font-weight="bold">
                                                <xsl:text>&#xA0;&#xA0; Phone: </xsl:text>
                                            </fo:inline>
                                            <fo:inline font-size="10pt" font-weight="normal">
                                                <xsl:text>+212</xsl:text>
                                            </fo:inline>
                                            <fo:inline font-size="10pt" font-weight="bold">
                                                <xsl:text> </xsl:text>
                                            </fo:inline>
                                            <fo:inline font-size="10pt" font-weight="normal">
                                                <xsl:value-of select="/user/phone"/>
                                            </fo:inline>
                                        </fo:block>
                                    </fo:block>
                                </fo:inline>
                            </fo:block>
                        </fo:block>
                    </fo:block>
                </fo:flow>
            </fo:page-sequence>
        </fo:root>
    </xsl:template>
</xsl:stylesheet>