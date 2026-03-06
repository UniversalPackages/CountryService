<?php

declare(strict_types=1);

namespace UniversalPackages\CountryService;

/**
 * Supported locale enum, synced from Country Service GraphQL schema.
 */
enum SupportedLocale: string
{
    /**
     * af
     */
    case AF = 'AF';

    /**
     * af-NA
     */
    case AF_NA = 'AF_NA';

    /**
     * af-ZA
     */
    case AF_ZA = 'AF_ZA';

    /**
     * ak
     */
    case AK = 'AK';

    /**
     * ak-GH
     */
    case AK_GH = 'AK_GH';

    /**
     * am
     */
    case AM = 'AM';

    /**
     * am-ET
     */
    case AM_ET = 'AM_ET';

    /**
     * ar
     */
    case AR = 'AR';

    /**
     * ar-AE
     */
    case AR_AE = 'AR_AE';

    /**
     * ar-BH
     */
    case AR_BH = 'AR_BH';

    /**
     * ar-DJ
     */
    case AR_DJ = 'AR_DJ';

    /**
     * ar-DZ
     */
    case AR_DZ = 'AR_DZ';

    /**
     * ar-EG
     */
    case AR_EG = 'AR_EG';

    /**
     * ar-EH
     */
    case AR_EH = 'AR_EH';

    /**
     * ar-ER
     */
    case AR_ER = 'AR_ER';

    /**
     * ar-IL
     */
    case AR_IL = 'AR_IL';

    /**
     * ar-IQ
     */
    case AR_IQ = 'AR_IQ';

    /**
     * ar-JO
     */
    case AR_JO = 'AR_JO';

    /**
     * ar-KM
     */
    case AR_KM = 'AR_KM';

    /**
     * ar-KW
     */
    case AR_KW = 'AR_KW';

    /**
     * ar-LB
     */
    case AR_LB = 'AR_LB';

    /**
     * ar-LY
     */
    case AR_LY = 'AR_LY';

    /**
     * ar-MA
     */
    case AR_MA = 'AR_MA';

    /**
     * ar-MR
     */
    case AR_MR = 'AR_MR';

    /**
     * ar-OM
     */
    case AR_OM = 'AR_OM';

    /**
     * ar-PS
     */
    case AR_PS = 'AR_PS';

    /**
     * ar-QA
     */
    case AR_QA = 'AR_QA';

    /**
     * ar-SA
     */
    case AR_SA = 'AR_SA';

    /**
     * ar-SD
     */
    case AR_SD = 'AR_SD';

    /**
     * ar-SO
     */
    case AR_SO = 'AR_SO';

    /**
     * ar-SS
     */
    case AR_SS = 'AR_SS';

    /**
     * ar-SY
     */
    case AR_SY = 'AR_SY';

    /**
     * ar-TD
     */
    case AR_TD = 'AR_TD';

    /**
     * ar-TN
     */
    case AR_TN = 'AR_TN';

    /**
     * ar-YE
     */
    case AR_YE = 'AR_YE';

    /**
     * as
     */
    case AS = 'AS';

    /**
     * as-IN
     */
    case AS_IN = 'AS_IN';

    /**
     * az
     */
    case AZ = 'AZ';

    /**
     * be
     */
    case BE = 'BE';

    /**
     * be-BY
     */
    case BE_BY = 'BE_BY';

    /**
     * bg
     */
    case BG = 'BG';

    /**
     * bg-BG
     */
    case BG_BG = 'BG_BG';

    /**
     * bm
     */
    case BM = 'BM';

    /**
     * bm-ML
     */
    case BM_ML = 'BM_ML';

    /**
     * bn
     */
    case BN = 'BN';

    /**
     * bn-BD
     */
    case BN_BD = 'BN_BD';

    /**
     * bn-IN
     */
    case BN_IN = 'BN_IN';

    /**
     * bo
     */
    case BO = 'BO';

    /**
     * bo-CN
     */
    case BO_CN = 'BO_CN';

    /**
     * bo-IN
     */
    case BO_IN = 'BO_IN';

    /**
     * br
     */
    case BR = 'BR';

    /**
     * br-FR
     */
    case BR_FR = 'BR_FR';

    /**
     * bs
     */
    case BS = 'BS';

    /**
     * ca
     */
    case CA = 'CA';

    /**
     * ca-AD
     */
    case CA_AD = 'CA_AD';

    /**
     * ca-ES
     */
    case CA_ES = 'CA_ES';

    /**
     * ca-FR
     */
    case CA_FR = 'CA_FR';

    /**
     * ca-IT
     */
    case CA_IT = 'CA_IT';

    /**
     * ce
     */
    case CE = 'CE';

    /**
     * ce-RU
     */
    case CE_RU = 'CE_RU';

    /**
     * ckb
     */
    case CKB = 'CKB';

    /**
     * ckb-IQ
     */
    case CKB_IQ = 'CKB_IQ';

    /**
     * ckb-IR
     */
    case CKB_IR = 'CKB_IR';

    /**
     * cs
     */
    case CS = 'CS';

    /**
     * cs-CZ
     */
    case CS_CZ = 'CS_CZ';

    /**
     * cy
     */
    case CY = 'CY';

    /**
     * cy-GB
     */
    case CY_GB = 'CY_GB';

    /**
     * da
     */
    case DA = 'DA';

    /**
     * da-DK
     */
    case DA_DK = 'DA_DK';

    /**
     * da-GL
     */
    case DA_GL = 'DA_GL';

    /**
     * de
     */
    case DE = 'DE';

    /**
     * de-AT
     */
    case DE_AT = 'DE_AT';

    /**
     * de-BE
     */
    case DE_BE = 'DE_BE';

    /**
     * de-CH
     */
    case DE_CH = 'DE_CH';

    /**
     * de-DE
     */
    case DE_DE = 'DE_DE';

    /**
     * de-IT
     */
    case DE_IT = 'DE_IT';

    /**
     * de-LI
     */
    case DE_LI = 'DE_LI';

    /**
     * de-LU
     */
    case DE_LU = 'DE_LU';

    /**
     * dz
     */
    case DZ = 'DZ';

    /**
     * dz-BT
     */
    case DZ_BT = 'DZ_BT';

    /**
     * ee
     */
    case EE = 'EE';

    /**
     * ee-GH
     */
    case EE_GH = 'EE_GH';

    /**
     * ee-TG
     */
    case EE_TG = 'EE_TG';

    /**
     * el
     */
    case EL = 'EL';

    /**
     * el-CY
     */
    case EL_CY = 'EL_CY';

    /**
     * el-GR
     */
    case EL_GR = 'EL_GR';

    /**
     * en
     */
    case EN = 'EN';

    /**
     * en-AE
     */
    case EN_AE = 'EN_AE';

    /**
     * en-AG
     */
    case EN_AG = 'EN_AG';

    /**
     * en-AI
     */
    case EN_AI = 'EN_AI';

    /**
     * en-AS
     */
    case EN_AS = 'EN_AS';

    /**
     * en-AT
     */
    case EN_AT = 'EN_AT';

    /**
     * en-AU
     */
    case EN_AU = 'EN_AU';

    /**
     * en-BB
     */
    case EN_BB = 'EN_BB';

    /**
     * en-BE
     */
    case EN_BE = 'EN_BE';

    /**
     * en-BI
     */
    case EN_BI = 'EN_BI';

    /**
     * en-BM
     */
    case EN_BM = 'EN_BM';

    /**
     * en-BS
     */
    case EN_BS = 'EN_BS';

    /**
     * en-BW
     */
    case EN_BW = 'EN_BW';

    /**
     * en-BZ
     */
    case EN_BZ = 'EN_BZ';

    /**
     * en-CA
     */
    case EN_CA = 'EN_CA';

    /**
     * en-CC
     */
    case EN_CC = 'EN_CC';

    /**
     * en-CH
     */
    case EN_CH = 'EN_CH';

    /**
     * en-CK
     */
    case EN_CK = 'EN_CK';

    /**
     * en-CM
     */
    case EN_CM = 'EN_CM';

    /**
     * en-CX
     */
    case EN_CX = 'EN_CX';

    /**
     * en-CY
     */
    case EN_CY = 'EN_CY';

    /**
     * en-DE
     */
    case EN_DE = 'EN_DE';

    /**
     * en-DG
     */
    case EN_DG = 'EN_DG';

    /**
     * en-DK
     */
    case EN_DK = 'EN_DK';

    /**
     * en-DM
     */
    case EN_DM = 'EN_DM';

    /**
     * en-ER
     */
    case EN_ER = 'EN_ER';

    /**
     * en-FI
     */
    case EN_FI = 'EN_FI';

    /**
     * en-FJ
     */
    case EN_FJ = 'EN_FJ';

    /**
     * en-FK
     */
    case EN_FK = 'EN_FK';

    /**
     * en-FM
     */
    case EN_FM = 'EN_FM';

    /**
     * en-GB
     */
    case EN_GB = 'EN_GB';

    /**
     * en-GD
     */
    case EN_GD = 'EN_GD';

    /**
     * en-GG
     */
    case EN_GG = 'EN_GG';

    /**
     * en-GH
     */
    case EN_GH = 'EN_GH';

    /**
     * en-GI
     */
    case EN_GI = 'EN_GI';

    /**
     * en-GM
     */
    case EN_GM = 'EN_GM';

    /**
     * en-GU
     */
    case EN_GU = 'EN_GU';

    /**
     * en-GY
     */
    case EN_GY = 'EN_GY';

    /**
     * en-HK
     */
    case EN_HK = 'EN_HK';

    /**
     * en-IE
     */
    case EN_IE = 'EN_IE';

    /**
     * en-IL
     */
    case EN_IL = 'EN_IL';

    /**
     * en-IM
     */
    case EN_IM = 'EN_IM';

    /**
     * en-IN
     */
    case EN_IN = 'EN_IN';

    /**
     * en-IO
     */
    case EN_IO = 'EN_IO';

    /**
     * en-JE
     */
    case EN_JE = 'EN_JE';

    /**
     * en-JM
     */
    case EN_JM = 'EN_JM';

    /**
     * en-KE
     */
    case EN_KE = 'EN_KE';

    /**
     * en-KI
     */
    case EN_KI = 'EN_KI';

    /**
     * en-KN
     */
    case EN_KN = 'EN_KN';

    /**
     * en-KY
     */
    case EN_KY = 'EN_KY';

    /**
     * en-LC
     */
    case EN_LC = 'EN_LC';

    /**
     * en-LR
     */
    case EN_LR = 'EN_LR';

    /**
     * en-LS
     */
    case EN_LS = 'EN_LS';

    /**
     * en-MG
     */
    case EN_MG = 'EN_MG';

    /**
     * en-MH
     */
    case EN_MH = 'EN_MH';

    /**
     * en-MO
     */
    case EN_MO = 'EN_MO';

    /**
     * en-MP
     */
    case EN_MP = 'EN_MP';

    /**
     * en-MS
     */
    case EN_MS = 'EN_MS';

    /**
     * en-MT
     */
    case EN_MT = 'EN_MT';

    /**
     * en-MU
     */
    case EN_MU = 'EN_MU';

    /**
     * en-MV
     */
    case EN_MV = 'EN_MV';

    /**
     * en-MW
     */
    case EN_MW = 'EN_MW';

    /**
     * en-MY
     */
    case EN_MY = 'EN_MY';

    /**
     * en-NA
     */
    case EN_NA = 'EN_NA';

    /**
     * en-NF
     */
    case EN_NF = 'EN_NF';

    /**
     * en-NG
     */
    case EN_NG = 'EN_NG';

    /**
     * en-NL
     */
    case EN_NL = 'EN_NL';

    /**
     * en-NR
     */
    case EN_NR = 'EN_NR';

    /**
     * en-NU
     */
    case EN_NU = 'EN_NU';

    /**
     * en-NZ
     */
    case EN_NZ = 'EN_NZ';

    /**
     * en-PG
     */
    case EN_PG = 'EN_PG';

    /**
     * en-PH
     */
    case EN_PH = 'EN_PH';

    /**
     * en-PK
     */
    case EN_PK = 'EN_PK';

    /**
     * en-PN
     */
    case EN_PN = 'EN_PN';

    /**
     * en-PR
     */
    case EN_PR = 'EN_PR';

    /**
     * en-PW
     */
    case EN_PW = 'EN_PW';

    /**
     * en-RW
     */
    case EN_RW = 'EN_RW';

    /**
     * en-SB
     */
    case EN_SB = 'EN_SB';

    /**
     * en-SC
     */
    case EN_SC = 'EN_SC';

    /**
     * en-SD
     */
    case EN_SD = 'EN_SD';

    /**
     * en-SE
     */
    case EN_SE = 'EN_SE';

    /**
     * en-SG
     */
    case EN_SG = 'EN_SG';

    /**
     * en-SH
     */
    case EN_SH = 'EN_SH';

    /**
     * en-SI
     */
    case EN_SI = 'EN_SI';

    /**
     * en-SL
     */
    case EN_SL = 'EN_SL';

    /**
     * en-SS
     */
    case EN_SS = 'EN_SS';

    /**
     * en-SX
     */
    case EN_SX = 'EN_SX';

    /**
     * en-SZ
     */
    case EN_SZ = 'EN_SZ';

    /**
     * en-TC
     */
    case EN_TC = 'EN_TC';

    /**
     * en-TK
     */
    case EN_TK = 'EN_TK';

    /**
     * en-TO
     */
    case EN_TO = 'EN_TO';

    /**
     * en-TT
     */
    case EN_TT = 'EN_TT';

    /**
     * en-TV
     */
    case EN_TV = 'EN_TV';

    /**
     * en-TZ
     */
    case EN_TZ = 'EN_TZ';

    /**
     * en-UG
     */
    case EN_UG = 'EN_UG';

    /**
     * en-UM
     */
    case EN_UM = 'EN_UM';

    /**
     * en-US
     */
    case EN_US = 'EN_US';

    /**
     * en-VC
     */
    case EN_VC = 'EN_VC';

    /**
     * en-VG
     */
    case EN_VG = 'EN_VG';

    /**
     * en-VI
     */
    case EN_VI = 'EN_VI';

    /**
     * en-VU
     */
    case EN_VU = 'EN_VU';

    /**
     * en-WS
     */
    case EN_WS = 'EN_WS';

    /**
     * en-ZA
     */
    case EN_ZA = 'EN_ZA';

    /**
     * en-ZM
     */
    case EN_ZM = 'EN_ZM';

    /**
     * en-ZW
     */
    case EN_ZW = 'EN_ZW';

    /**
     * eo
     */
    case EO = 'EO';

    /**
     * es
     */
    case ES = 'ES';

    /**
     * es-419
     */
    case ES_419 = 'ES_419';

    /**
     * es-AR
     */
    case ES_AR = 'ES_AR';

    /**
     * es-BO
     */
    case ES_BO = 'ES_BO';

    /**
     * es-BR
     */
    case ES_BR = 'ES_BR';

    /**
     * es-BZ
     */
    case ES_BZ = 'ES_BZ';

    /**
     * es-CL
     */
    case ES_CL = 'ES_CL';

    /**
     * es-CO
     */
    case ES_CO = 'ES_CO';

    /**
     * es-CR
     */
    case ES_CR = 'ES_CR';

    /**
     * es-CU
     */
    case ES_CU = 'ES_CU';

    /**
     * es-DO
     */
    case ES_DO = 'ES_DO';

    /**
     * es-EA
     */
    case ES_EA = 'ES_EA';

    /**
     * es-EC
     */
    case ES_EC = 'ES_EC';

    /**
     * es-ES
     */
    case ES_ES = 'ES_ES';

    /**
     * es-GQ
     */
    case ES_GQ = 'ES_GQ';

    /**
     * es-GT
     */
    case ES_GT = 'ES_GT';

    /**
     * es-HN
     */
    case ES_HN = 'ES_HN';

    /**
     * es-IC
     */
    case ES_IC = 'ES_IC';

    /**
     * es-MX
     */
    case ES_MX = 'ES_MX';

    /**
     * es-NI
     */
    case ES_NI = 'ES_NI';

    /**
     * es-PA
     */
    case ES_PA = 'ES_PA';

    /**
     * es-PE
     */
    case ES_PE = 'ES_PE';

    /**
     * es-PH
     */
    case ES_PH = 'ES_PH';

    /**
     * es-PR
     */
    case ES_PR = 'ES_PR';

    /**
     * es-PY
     */
    case ES_PY = 'ES_PY';

    /**
     * es-SV
     */
    case ES_SV = 'ES_SV';

    /**
     * es-US
     */
    case ES_US = 'ES_US';

    /**
     * es-UY
     */
    case ES_UY = 'ES_UY';

    /**
     * es-VE
     */
    case ES_VE = 'ES_VE';

    /**
     * et
     */
    case ET = 'ET';

    /**
     * et-EE
     */
    case ET_EE = 'ET_EE';

    /**
     * eu
     */
    case EU = 'EU';

    /**
     * eu-ES
     */
    case EU_ES = 'EU_ES';

    /**
     * fa
     */
    case FA = 'FA';

    /**
     * fa-AF
     */
    case FA_AF = 'FA_AF';

    /**
     * fa-IR
     */
    case FA_IR = 'FA_IR';

    /**
     * ff
     */
    case FF = 'FF';

    /**
     * fi
     */
    case FI = 'FI';

    /**
     * fi-FI
     */
    case FI_FI = 'FI_FI';

    /**
     * fil
     */
    case FIL = 'FIL';

    /**
     * fil-PH
     */
    case FIL_PH = 'FIL_PH';

    /**
     * fo
     */
    case FO = 'FO';

    /**
     * fo-DK
     */
    case FO_DK = 'FO_DK';

    /**
     * fo-FO
     */
    case FO_FO = 'FO_FO';

    /**
     * fr
     */
    case FR = 'FR';

    /**
     * fr-BE
     */
    case FR_BE = 'FR_BE';

    /**
     * fr-BF
     */
    case FR_BF = 'FR_BF';

    /**
     * fr-BI
     */
    case FR_BI = 'FR_BI';

    /**
     * fr-BJ
     */
    case FR_BJ = 'FR_BJ';

    /**
     * fr-BL
     */
    case FR_BL = 'FR_BL';

    /**
     * fr-CA
     */
    case FR_CA = 'FR_CA';

    /**
     * fr-CD
     */
    case FR_CD = 'FR_CD';

    /**
     * fr-CF
     */
    case FR_CF = 'FR_CF';

    /**
     * fr-CG
     */
    case FR_CG = 'FR_CG';

    /**
     * fr-CH
     */
    case FR_CH = 'FR_CH';

    /**
     * fr-CI
     */
    case FR_CI = 'FR_CI';

    /**
     * fr-CM
     */
    case FR_CM = 'FR_CM';

    /**
     * fr-DJ
     */
    case FR_DJ = 'FR_DJ';

    /**
     * fr-DZ
     */
    case FR_DZ = 'FR_DZ';

    /**
     * fr-FR
     */
    case FR_FR = 'FR_FR';

    /**
     * fr-GA
     */
    case FR_GA = 'FR_GA';

    /**
     * fr-GF
     */
    case FR_GF = 'FR_GF';

    /**
     * fr-GN
     */
    case FR_GN = 'FR_GN';

    /**
     * fr-GP
     */
    case FR_GP = 'FR_GP';

    /**
     * fr-GQ
     */
    case FR_GQ = 'FR_GQ';

    /**
     * fr-HT
     */
    case FR_HT = 'FR_HT';

    /**
     * fr-KM
     */
    case FR_KM = 'FR_KM';

    /**
     * fr-LU
     */
    case FR_LU = 'FR_LU';

    /**
     * fr-MA
     */
    case FR_MA = 'FR_MA';

    /**
     * fr-MC
     */
    case FR_MC = 'FR_MC';

    /**
     * fr-MF
     */
    case FR_MF = 'FR_MF';

    /**
     * fr-MG
     */
    case FR_MG = 'FR_MG';

    /**
     * fr-ML
     */
    case FR_ML = 'FR_ML';

    /**
     * fr-MQ
     */
    case FR_MQ = 'FR_MQ';

    /**
     * fr-MR
     */
    case FR_MR = 'FR_MR';

    /**
     * fr-MU
     */
    case FR_MU = 'FR_MU';

    /**
     * fr-NC
     */
    case FR_NC = 'FR_NC';

    /**
     * fr-NE
     */
    case FR_NE = 'FR_NE';

    /**
     * fr-PF
     */
    case FR_PF = 'FR_PF';

    /**
     * fr-PM
     */
    case FR_PM = 'FR_PM';

    /**
     * fr-RE
     */
    case FR_RE = 'FR_RE';

    /**
     * fr-RW
     */
    case FR_RW = 'FR_RW';

    /**
     * fr-SC
     */
    case FR_SC = 'FR_SC';

    /**
     * fr-SN
     */
    case FR_SN = 'FR_SN';

    /**
     * fr-SY
     */
    case FR_SY = 'FR_SY';

    /**
     * fr-TD
     */
    case FR_TD = 'FR_TD';

    /**
     * fr-TG
     */
    case FR_TG = 'FR_TG';

    /**
     * fr-TN
     */
    case FR_TN = 'FR_TN';

    /**
     * fr-VU
     */
    case FR_VU = 'FR_VU';

    /**
     * fr-WF
     */
    case FR_WF = 'FR_WF';

    /**
     * fr-YT
     */
    case FR_YT = 'FR_YT';

    /**
     * fy
     */
    case FY = 'FY';

    /**
     * fy-NL
     */
    case FY_NL = 'FY_NL';

    /**
     * ga
     */
    case GA = 'GA';

    /**
     * ga-GB
     */
    case GA_GB = 'GA_GB';

    /**
     * ga-IE
     */
    case GA_IE = 'GA_IE';

    /**
     * gd
     */
    case GD = 'GD';

    /**
     * gd-GB
     */
    case GD_GB = 'GD_GB';

    /**
     * gl
     */
    case GL = 'GL';

    /**
     * gl-ES
     */
    case GL_ES = 'GL_ES';

    /**
     * gu
     */
    case GU = 'GU';

    /**
     * gu-IN
     */
    case GU_IN = 'GU_IN';

    /**
     * gv
     */
    case GV = 'GV';

    /**
     * gv-IM
     */
    case GV_IM = 'GV_IM';

    /**
     * ha
     */
    case HA = 'HA';

    /**
     * ha-GH
     */
    case HA_GH = 'HA_GH';

    /**
     * ha-NE
     */
    case HA_NE = 'HA_NE';

    /**
     * ha-NG
     */
    case HA_NG = 'HA_NG';

    /**
     * he
     */
    case HE = 'HE';

    /**
     * he-IL
     */
    case HE_IL = 'HE_IL';

    /**
     * hi
     */
    case HI = 'HI';

    /**
     * hi-IN
     */
    case HI_IN = 'HI_IN';

    /**
     * hr
     */
    case HR = 'HR';

    /**
     * hr-BA
     */
    case HR_BA = 'HR_BA';

    /**
     * hr-HR
     */
    case HR_HR = 'HR_HR';

    /**
     * hu
     */
    case HU = 'HU';

    /**
     * hu-HU
     */
    case HU_HU = 'HU_HU';

    /**
     * hy
     */
    case HY = 'HY';

    /**
     * hy-AM
     */
    case HY_AM = 'HY_AM';

    /**
     * ia
     */
    case IA = 'IA';

    /**
     * id
     */
    case ID = 'ID';

    /**
     * id-ID
     */
    case ID_ID = 'ID_ID';

    /**
     * ig
     */
    case IG = 'IG';

    /**
     * ig-NG
     */
    case IG_NG = 'IG_NG';

    /**
     * ii
     */
    case II = 'II';

    /**
     * ii-CN
     */
    case II_CN = 'II_CN';

    /**
     * is
     */
    case IS = 'IS';

    /**
     * is-IS
     */
    case IS_IS = 'IS_IS';

    /**
     * it
     */
    case IT = 'IT';

    /**
     * it-CH
     */
    case IT_CH = 'IT_CH';

    /**
     * it-IT
     */
    case IT_IT = 'IT_IT';

    /**
     * it-SM
     */
    case IT_SM = 'IT_SM';

    /**
     * it-VA
     */
    case IT_VA = 'IT_VA';

    /**
     * ja
     */
    case JA = 'JA';

    /**
     * ja-JP
     */
    case JA_JP = 'JA_JP';

    /**
     * jv
     */
    case JV = 'JV';

    /**
     * jv-ID
     */
    case JV_ID = 'JV_ID';

    /**
     * ka
     */
    case KA = 'KA';

    /**
     * ka-GE
     */
    case KA_GE = 'KA_GE';

    /**
     * ki
     */
    case KI = 'KI';

    /**
     * ki-KE
     */
    case KI_KE = 'KI_KE';

    /**
     * kk
     */
    case KK = 'KK';

    /**
     * kk-KZ
     */
    case KK_KZ = 'KK_KZ';

    /**
     * kl
     */
    case KL = 'KL';

    /**
     * kl-GL
     */
    case KL_GL = 'KL_GL';

    /**
     * km
     */
    case KM = 'KM';

    /**
     * km-KH
     */
    case KM_KH = 'KM_KH';

    /**
     * kn
     */
    case KN = 'KN';

    /**
     * kn-IN
     */
    case KN_IN = 'KN_IN';

    /**
     * ko
     */
    case KO = 'KO';

    /**
     * ko-KP
     */
    case KO_KP = 'KO_KP';

    /**
     * ko-KR
     */
    case KO_KR = 'KO_KR';

    /**
     * ks
     */
    case KS = 'KS';

    /**
     * ku
     */
    case KU = 'KU';

    /**
     * ku-TR
     */
    case KU_TR = 'KU_TR';

    /**
     * kw
     */
    case KW = 'KW';

    /**
     * kw-GB
     */
    case KW_GB = 'KW_GB';

    /**
     * ky
     */
    case KY = 'KY';

    /**
     * ky-KG
     */
    case KY_KG = 'KY_KG';

    /**
     * lb
     */
    case LB = 'LB';

    /**
     * lb-LU
     */
    case LB_LU = 'LB_LU';

    /**
     * lg
     */
    case LG = 'LG';

    /**
     * lg-UG
     */
    case LG_UG = 'LG_UG';

    /**
     * ln
     */
    case LN = 'LN';

    /**
     * ln-AO
     */
    case LN_AO = 'LN_AO';

    /**
     * ln-CD
     */
    case LN_CD = 'LN_CD';

    /**
     * ln-CF
     */
    case LN_CF = 'LN_CF';

    /**
     * ln-CG
     */
    case LN_CG = 'LN_CG';

    /**
     * lo
     */
    case LO = 'LO';

    /**
     * lo-LA
     */
    case LO_LA = 'LO_LA';

    /**
     * lt
     */
    case LT = 'LT';

    /**
     * lt-LT
     */
    case LT_LT = 'LT_LT';

    /**
     * lu
     */
    case LU = 'LU';

    /**
     * lu-CD
     */
    case LU_CD = 'LU_CD';

    /**
     * lv
     */
    case LV = 'LV';

    /**
     * lv-LV
     */
    case LV_LV = 'LV_LV';

    /**
     * mg
     */
    case MG = 'MG';

    /**
     * mg-MG
     */
    case MG_MG = 'MG_MG';

    /**
     * mi
     */
    case MI = 'MI';

    /**
     * mi-NZ
     */
    case MI_NZ = 'MI_NZ';

    /**
     * mk
     */
    case MK = 'MK';

    /**
     * mk-MK
     */
    case MK_MK = 'MK_MK';

    /**
     * ml
     */
    case ML = 'ML';

    /**
     * ml-IN
     */
    case ML_IN = 'ML_IN';

    /**
     * mn
     */
    case MN = 'MN';

    /**
     * mn-MN
     */
    case MN_MN = 'MN_MN';

    /**
     * mr
     */
    case MR = 'MR';

    /**
     * mr-IN
     */
    case MR_IN = 'MR_IN';

    /**
     * ms
     */
    case MS = 'MS';

    /**
     * ms-BN
     */
    case MS_BN = 'MS_BN';

    /**
     * ms-ID
     */
    case MS_ID = 'MS_ID';

    /**
     * ms-MY
     */
    case MS_MY = 'MS_MY';

    /**
     * ms-SG
     */
    case MS_SG = 'MS_SG';

    /**
     * mt
     */
    case MT = 'MT';

    /**
     * mt-MT
     */
    case MT_MT = 'MT_MT';

    /**
     * my
     */
    case MY = 'MY';

    /**
     * my-MM
     */
    case MY_MM = 'MY_MM';

    /**
     * nb
     */
    case NB = 'NB';

    /**
     * nb-NO
     */
    case NB_NO = 'NB_NO';

    /**
     * nb-SJ
     */
    case NB_SJ = 'NB_SJ';

    /**
     * nd
     */
    case ND = 'ND';

    /**
     * nd-ZW
     */
    case ND_ZW = 'ND_ZW';

    /**
     * ne
     */
    case NE = 'NE';

    /**
     * ne-IN
     */
    case NE_IN = 'NE_IN';

    /**
     * ne-NP
     */
    case NE_NP = 'NE_NP';

    /**
     * nl
     */
    case NL = 'NL';

    /**
     * nl-AW
     */
    case NL_AW = 'NL_AW';

    /**
     * nl-BE
     */
    case NL_BE = 'NL_BE';

    /**
     * nl-BQ
     */
    case NL_BQ = 'NL_BQ';

    /**
     * nl-CW
     */
    case NL_CW = 'NL_CW';

    /**
     * nl-NL
     */
    case NL_NL = 'NL_NL';

    /**
     * nl-SR
     */
    case NL_SR = 'NL_SR';

    /**
     * nl-SX
     */
    case NL_SX = 'NL_SX';

    /**
     * nn
     */
    case NN = 'NN';

    /**
     * nn-NO
     */
    case NN_NO = 'NN_NO';

    /**
     * no
     */
    case NO = 'NO';

    /**
     * om
     */
    case OM = 'OM';

    /**
     * om-ET
     */
    case OM_ET = 'OM_ET';

    /**
     * om-KE
     */
    case OM_KE = 'OM_KE';

    /**
     * or
     */
    case OR = 'OR';

    /**
     * or-IN
     */
    case OR_IN = 'OR_IN';

    /**
     * os
     */
    case OS = 'OS';

    /**
     * os-GE
     */
    case OS_GE = 'OS_GE';

    /**
     * os-RU
     */
    case OS_RU = 'OS_RU';

    /**
     * pa
     */
    case PA = 'PA';

    /**
     * pl
     */
    case PL = 'PL';

    /**
     * pl-PL
     */
    case PL_PL = 'PL_PL';

    /**
     * ps
     */
    case PS = 'PS';

    /**
     * ps-AF
     */
    case PS_AF = 'PS_AF';

    /**
     * ps-PK
     */
    case PS_PK = 'PS_PK';

    /**
     * pt-PT
     */
    case PT = 'PT';

    /**
     * pt-AO
     */
    case PT_AO = 'PT_AO';

    /**
     * pt-BR
     */
    case PT_BR = 'PT_BR';

    /**
     * pt-CH
     */
    case PT_CH = 'PT_CH';

    /**
     * pt-CV
     */
    case PT_CV = 'PT_CV';

    /**
     * pt-GQ
     */
    case PT_GQ = 'PT_GQ';

    /**
     * pt-GW
     */
    case PT_GW = 'PT_GW';

    /**
     * pt-LU
     */
    case PT_LU = 'PT_LU';

    /**
     * pt-MO
     */
    case PT_MO = 'PT_MO';

    /**
     * pt-MZ
     */
    case PT_MZ = 'PT_MZ';

    /**
     * pt-PT
     */
    case PT_PT = 'PT_PT';

    /**
     * pt-ST
     */
    case PT_ST = 'PT_ST';

    /**
     * pt-TL
     */
    case PT_TL = 'PT_TL';

    /**
     * qu
     */
    case QU = 'QU';

    /**
     * qu-BO
     */
    case QU_BO = 'QU_BO';

    /**
     * qu-EC
     */
    case QU_EC = 'QU_EC';

    /**
     * qu-PE
     */
    case QU_PE = 'QU_PE';

    /**
     * rm
     */
    case RM = 'RM';

    /**
     * rm-CH
     */
    case RM_CH = 'RM_CH';

    /**
     * rn
     */
    case RN = 'RN';

    /**
     * rn-BI
     */
    case RN_BI = 'RN_BI';

    /**
     * ro
     */
    case RO = 'RO';

    /**
     * ro-MD
     */
    case RO_MD = 'RO_MD';

    /**
     * ro-RO
     */
    case RO_RO = 'RO_RO';

    /**
     * ru
     */
    case RU = 'RU';

    /**
     * ru-BY
     */
    case RU_BY = 'RU_BY';

    /**
     * ru-KG
     */
    case RU_KG = 'RU_KG';

    /**
     * ru-KZ
     */
    case RU_KZ = 'RU_KZ';

    /**
     * ru-MD
     */
    case RU_MD = 'RU_MD';

    /**
     * ru-RU
     */
    case RU_RU = 'RU_RU';

    /**
     * ru-UA
     */
    case RU_UA = 'RU_UA';

    /**
     * rw
     */
    case RW = 'RW';

    /**
     * rw-RW
     */
    case RW_RW = 'RW_RW';

    /**
     * sa
     */
    case SA = 'SA';

    /**
     * sa-IN
     */
    case SA_IN = 'SA_IN';

    /**
     * sc
     */
    case SC = 'SC';

    /**
     * sc-IT
     */
    case SC_IT = 'SC_IT';

    /**
     * sd
     */
    case SD = 'SD';

    /**
     * se
     */
    case SE = 'SE';

    /**
     * se-FI
     */
    case SE_FI = 'SE_FI';

    /**
     * se-NO
     */
    case SE_NO = 'SE_NO';

    /**
     * se-SE
     */
    case SE_SE = 'SE_SE';

    /**
     * sg
     */
    case SG = 'SG';

    /**
     * sg-CF
     */
    case SG_CF = 'SG_CF';

    /**
     * si
     */
    case SI = 'SI';

    /**
     * si-LK
     */
    case SI_LK = 'SI_LK';

    /**
     * sk
     */
    case SK = 'SK';

    /**
     * sk-SK
     */
    case SK_SK = 'SK_SK';

    /**
     * sl
     */
    case SL = 'SL';

    /**
     * sl-SI
     */
    case SL_SI = 'SL_SI';

    /**
     * sn
     */
    case SN = 'SN';

    /**
     * sn-ZW
     */
    case SN_ZW = 'SN_ZW';

    /**
     * so
     */
    case SO = 'SO';

    /**
     * so-DJ
     */
    case SO_DJ = 'SO_DJ';

    /**
     * so-ET
     */
    case SO_ET = 'SO_ET';

    /**
     * so-KE
     */
    case SO_KE = 'SO_KE';

    /**
     * so-SO
     */
    case SO_SO = 'SO_SO';

    /**
     * sq
     */
    case SQ = 'SQ';

    /**
     * sq-AL
     */
    case SQ_AL = 'SQ_AL';

    /**
     * sq-MK
     */
    case SQ_MK = 'SQ_MK';

    /**
     * sq-XK
     */
    case SQ_XK = 'SQ_XK';

    /**
     * sr
     */
    case SR = 'SR';

    /**
     * su
     */
    case SU = 'SU';

    /**
     * sv
     */
    case SV = 'SV';

    /**
     * sv-AX
     */
    case SV_AX = 'SV_AX';

    /**
     * sv-FI
     */
    case SV_FI = 'SV_FI';

    /**
     * sv-SE
     */
    case SV_SE = 'SV_SE';

    /**
     * sw
     */
    case SW = 'SW';

    /**
     * sw-CD
     */
    case SW_CD = 'SW_CD';

    /**
     * sw-KE
     */
    case SW_KE = 'SW_KE';

    /**
     * sw-TZ
     */
    case SW_TZ = 'SW_TZ';

    /**
     * sw-UG
     */
    case SW_UG = 'SW_UG';

    /**
     * ta
     */
    case TA = 'TA';

    /**
     * ta-IN
     */
    case TA_IN = 'TA_IN';

    /**
     * ta-LK
     */
    case TA_LK = 'TA_LK';

    /**
     * ta-MY
     */
    case TA_MY = 'TA_MY';

    /**
     * ta-SG
     */
    case TA_SG = 'TA_SG';

    /**
     * te
     */
    case TE = 'TE';

    /**
     * te-IN
     */
    case TE_IN = 'TE_IN';

    /**
     * tg
     */
    case TG = 'TG';

    /**
     * tg-TJ
     */
    case TG_TJ = 'TG_TJ';

    /**
     * th
     */
    case TH = 'TH';

    /**
     * th-TH
     */
    case TH_TH = 'TH_TH';

    /**
     * ti
     */
    case TI = 'TI';

    /**
     * ti-ER
     */
    case TI_ER = 'TI_ER';

    /**
     * ti-ET
     */
    case TI_ET = 'TI_ET';

    /**
     * tk
     */
    case TK = 'TK';

    /**
     * tk-TM
     */
    case TK_TM = 'TK_TM';

    /**
     * to
     */
    case TO = 'TO';

    /**
     * to-TO
     */
    case TO_TO = 'TO_TO';

    /**
     * tr
     */
    case TR = 'TR';

    /**
     * tr-CY
     */
    case TR_CY = 'TR_CY';

    /**
     * tr-TR
     */
    case TR_TR = 'TR_TR';

    /**
     * tt
     */
    case TT = 'TT';

    /**
     * tt-RU
     */
    case TT_RU = 'TT_RU';

    /**
     * ug
     */
    case UG = 'UG';

    /**
     * ug-CN
     */
    case UG_CN = 'UG_CN';

    /**
     * uk
     */
    case UK = 'UK';

    /**
     * uk-UA
     */
    case UK_UA = 'UK_UA';

    /**
     * ur
     */
    case UR = 'UR';

    /**
     * ur-IN
     */
    case UR_IN = 'UR_IN';

    /**
     * ur-PK
     */
    case UR_PK = 'UR_PK';

    /**
     * uz
     */
    case UZ = 'UZ';

    /**
     * vi
     */
    case VI = 'VI';

    /**
     * vi-VN
     */
    case VI_VN = 'VI_VN';

    /**
     * wo
     */
    case WO = 'WO';

    /**
     * wo-SN
     */
    case WO_SN = 'WO_SN';

    /**
     * xh
     */
    case XH = 'XH';

    /**
     * xh-ZA
     */
    case XH_ZA = 'XH_ZA';

    /**
     * yi
     */
    case YI = 'YI';

    /**
     * yo
     */
    case YO = 'YO';

    /**
     * yo-BJ
     */
    case YO_BJ = 'YO_BJ';

    /**
     * yo-NG
     */
    case YO_NG = 'YO_NG';

    /**
     * zh
     */
    case ZH = 'ZH';

    /**
     * zh-CN
     */
    case ZH_CN = 'ZH_CN';

    /**
     * zh-HK
     */
    case ZH_HK = 'ZH_HK';

    /**
     * zh-TW
     */
    case ZH_TW = 'ZH_TW';

    /**
     * zu
     */
    case ZU = 'ZU';

    /**
     * zu-ZA
     */
    case ZU_ZA = 'ZU_ZA';
}