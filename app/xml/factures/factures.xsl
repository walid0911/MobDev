<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:fo="http://www.w3.org/1999/XSL/Format" xmlns:x="https://www.w3schools.com" exclude-result-prefixes="x">
    <xsl:template match="/">
        <fo:root xmlns:fo="http://www.w3.org/1999/XSL/Format">
            <fo:layout-master-set>
                <fo:simple-page-master master-name="a4" page-height="29.7cm" page-width="21.0cm" margin-top="2cm" margin-bottom="2cm" margin-left="1.5cm" margin-right="1.5cm">
                    <fo:region-body region-name="body"/>
                </fo:simple-page-master>
            </fo:layout-master-set>
            <fo:page-sequence master-reference="a4">
                <fo:flow flow-name="body">
                    <fo:block font-size="32pt">Invoice</fo:block>
                    <xsl:apply-templates select="x:factures"/>
                </fo:flow>
            </fo:page-sequence>
        </fo:root>
    </xsl:template>

    <xsl:template match="x:factures">
        <xsl:for-each select="x:facture">
            <xsl:apply-templates/>
        </xsl:for-each>
    </xsl:template>

    <xsl:template match="x:factureID">
        <fo:block font-size="16pt">Number : <xsl:value-of select="."/></fo:block>
    </xsl:template>

    <xsl:template match="x:userName">
        <fo:block space-before.optimum="1cm" font-size="16pt" font-weight="bold">Invoice to :</fo:block>
        <fo:block space-before.optimum=".5cm" font-size="12pt" font-weight="bold">Name : <fo:inline font-weight="normal"><xsl:value-of select="x:userLastName"/>, <xsl:value-of select="x:userFirstName"/></fo:inline></fo:block>
    </xsl:template>

    <xsl:template match="x:userPhone">
        <fo:block font-size="12pt" font-weight="bold">Phone : <fo:inline font-weight="normal"><xsl:value-of select="."/></fo:inline></fo:block>
    </xsl:template>

    <xsl:template match="x:date">
        <fo:block font-size="12pt" font-weight="bold">Date : <fo:inline font-weight="normal"><xsl:value-of select="."/></fo:inline></fo:block>
    </xsl:template>

    <xsl:template match="x:products">
        <fo:table table-layout="fixed" space-before.optimum="2cm">
            <fo:table-column column-number="1" column-width="10cm"/>
            <fo:table-column column-number="2" column-width="2.5cm"/>
            <fo:table-column column-number="3" column-width="2.75cm"/>
            <fo:table-column column-number="4" column-width="2.75cm"/>
            <fo:table-header>
                <fo:table-cell column-number="1" padding="6pt" background-color="#bababa" border="2pt solid black">
                    <fo:block font-weight="bold" font-size="12pt">Product</fo:block>
                </fo:table-cell>
                <fo:table-cell column-number="2" padding="6pt" background-color="#bababa" border="2pt solid black">
                    <fo:block font-weight="bold" font-size="12pt">Quantity</fo:block>
                </fo:table-cell>
                <fo:table-cell column-number="3" padding="6pt" background-color="#bababa" border="2pt solid black">
                    <fo:block font-weight="bold" font-size="12pt">Price Unit</fo:block>
                </fo:table-cell>
                <fo:table-cell column-number="4" padding="6pt" background-color="#bababa" border="2pt solid black">
                    <fo:block font-weight="bold" font-size="12pt">Price All</fo:block>
                </fo:table-cell>
            </fo:table-header>
            <fo:table-body>
                <xsl:for-each select="x:product">
                    <fo:table-row>
                        <fo:table-cell column-number="1" padding="6pt" border="2pt solid black">
                            <fo:block font-size="12pt"><xsl:value-of select="x:description"/></fo:block>
                        </fo:table-cell>
                        <fo:table-cell column-number="2" padding="6pt" border="2pt solid black" text-align="right">
                            <fo:block font-size="12pt"><xsl:value-of select="x:quantity"/></fo:block>
                        </fo:table-cell>
                        <fo:table-cell column-number="3" padding="6pt" border="2pt solid black" text-align="right">
                            <fo:block font-size="12pt"><xsl:value-of select="x:unitPrice"/></fo:block>
                        </fo:table-cell>
                        <fo:table-cell column-number="4" padding="6pt" border="2pt solid black" text-align="right">
                            <fo:block font-size="12pt"><xsl:value-of select="x:allPrice"/></fo:block>
                        </fo:table-cell>
                    </fo:table-row>
                </xsl:for-each>
                <fo:table-row>
                    <fo:table-cell column-number="1" number-columns-spanned="2" padding="6pt" background-color="#bababa" border="2pt solid black">
                        <fo:block font-size="12pt" font-weight="bold">Sub-Total</fo:block>
                    </fo:table-cell>
                    <fo:table-cell column-number="3" number-columns-spanned="2" padding="6pt" border="2pt solid black">
                        <fo:block font-size="12pt"><xsl:value-of select="../x:totalPrice"/></fo:block>
                    </fo:table-cell>
                </fo:table-row>
                <fo:table-row>
                    <fo:table-cell column-number="1" number-columns-spanned="2" padding="6pt" background-color="#bababa" border="2pt solid black">
                        <fo:block font-size="12pt" font-weight="bold">V.A.T. (20%)</fo:block>
                    </fo:table-cell>
                    <fo:table-cell column-number="3" number-columns-spanned="2" padding="6pt" border="2pt solid black">
                        <fo:block font-size="12pt">empty</fo:block>
                    </fo:table-cell>
                </fo:table-row>
                <fo:table-row>
                    <fo:table-cell column-number="1" number-columns-spanned="2" padding="6pt" background-color="#bababa" border="2pt solid black">
                        <fo:block font-size="12pt" font-weight="bold">Total</fo:block>
                    </fo:table-cell>
                    <fo:table-cell column-number="3" number-columns-spanned="2" padding="6pt" border="2pt solid black">
                        <fo:block font-size="12pt"><xsl:value-of select="../x:totalPrice"/></fo:block>
                    </fo:table-cell>
                </fo:table-row>
            </fo:table-body>
        </fo:table>
    </xsl:template>
</xsl:stylesheet>
