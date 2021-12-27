<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:s="http://www.stylusstudio.com/xquery" xmlns:def="https://www.w3schools.com">
    <xsl:template match="/">
        <fo:root xmlns:fo="http://www.w3.org/1999/XSL/Format">
            <fo:layout-master-set>
                <fo:simple-page-master master-name="default-page" page-height="2.125in" page-width="4.375in" margin-left="0.6in" margin-right="0.6in" margin-top="0in" margin-bottom="0in">
                    <fo:region-body/>
                </fo:simple-page-master>
            </fo:layout-master-set>
            <fo:page-sequence master-reference="default-page">
                <fo:flow flow-name="xsl-region-body">
                    <fo:block>
                        <fo:block>
                            <fo:block text-align="center">
                                <fo:block>
                                    <fo:inline font-family="Arial" font-size="14pt" font-weight="bold">
                                        <xsl:text>Customer Card</xsl:text>
                                    </fo:inline>
                                </fo:block>
                            </fo:block>
                        </fo:block>
                        <fo:block>
                            <xsl:text>&#xA0;&#xA0;Nam</xsl:text>
                            <fo:inline font-weight="bold">e:&#xA0;&#xA0;&#xA0;&#xA0;&#xA0;&#xA0;
                                <xsl:value-of select="/def:users/def:user/def:firstName"/>&#xA0;&#xA0;&#xA0;&#xA0;
                                <xsl:value-of select="/def:users/def:user/def:lastName"/>
                            </fo:inline>
                        </fo:block>
                        <fo:block>
                            <fo:inline font-weight="bold">&#xA0;&#xA0;Email:&#xA0;&#xA0;&#xA0;&#xA0;&#xA0;&#xA0;
                                <xsl:value-of select="/def:users/def:user/def:email"/>
                            </fo:inline>
                        </fo:block>
                        <fo:block>
                            <fo:inline font-weight="bold">&#xA0;&#xA0;Phone Number: +212
                                <xsl:value-of select="/def:users/def:user/def:phone"/>
                                <xsl:text> </xsl:text>
                            </fo:inline>
                        </fo:block>
                    </fo:block>
                </fo:flow>
            </fo:page-sequence>
        </fo:root>
    </xsl:template>
</xsl:stylesheet>