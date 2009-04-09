<?php
/**
 * Zend_Validate系のZend_Translate用日本語リソースファイル
 * 
 * http://framework.zend.com/manual/ja/zend.form.i18n.html
 * 他クラスを読み込むので、autoloadの設定をしておくかはあらかじめrequireしておいてください
 * 
 * 使い方:
 * $adapter = Twk_Translate_Ja::getInstance();
 * $adapter->getAdapter()->addTranslation(array(
 * 	'定数または英語リソース文字列' => '上書きしたい独自の日本語翻訳文字列',
 * ), 'ja'); // 上書きしたいものがなければここは不要
 * Zend_Registry::set('Zend_Translate', $adapter); // Zend_Form等で使用できるように登録
 * 
 * 翻訳は未完なのでどんどん足していただき、twitter等で教えてくれると嬉しいです
 * @author twk (http://twitter.com/twk/)
 */

class Twk_Translate_Ja {
	/**
	 * @return Zend_Translate
	 */
	public static function getInstance(){
	    static $adapter = null; 
	    if (!$adapter)
	    {
		    $adapter = new Zend_Translate('array', array(
				Zend_Validate_Date::NOT_YYYY_MM_DD => "「%value%」が YYYY-MM-DD 形式ではありません",
				Zend_Validate_Date::INVALID        => "「%value%」は正しい日付ではないようです",
				
				Zend_Validate_Ccnum::LENGTH   => "「%value%」は13桁から19桁の数字でなければなりません",
				Zend_Validate_Ccnum::CHECKSUM => "「%value%」はルーンアルゴリズムでのチェックに失敗しました",
				
				Zend_Validate_Between::NOT_BETWEEN        => "「%value%」は「%min%」以上「%max%」以下ではありません",
				Zend_Validate_Between::NOT_BETWEEN_STRICT => "「%value%」は「%min%」以下か「%max%」以上です",
				
				Zend_Validate_Alpha::NOT_ALPHA    => "「%value%」にアルファベット以外の文字が含まれています",
				Zend_Validate_Alpha::STRING_EMPTY => "「%value%」は空の文字列です",
				
				Zend_Validate_Alnum::NOT_ALNUM    => "「%value%」にアルファベットと数字以外の文字が含まれています",
				Zend_Validate_Alnum::STRING_EMPTY => "「%value%」は空の文字列です",
				
				Zend_Validate_StringLength::TOO_SHORT => "「%value%」は %min% 文字より短いです",
				Zend_Validate_StringLength::TOO_LONG  => "「%value%」は %max% 文字より長いです",
				
				Zend_Validate_Regex::NOT_MATCH => "「%value%」はパターン「%pattern%」に合いません",
				
				Zend_Validate_NotEmpty::IS_EMPTY => "値が空ですが、空ではない値が必要です",
				
				Zend_Validate_LessThan::NOT_LESS => "「%value%」は %max% 未満ではありません",
				
				Zend_Validate_Ip::NOT_IP_ADDRESS => "「%value%」は IP アドレスではないようです",
				
				Zend_Validate_Int::NOT_INT => "「%value%」は整数ではないようです",
				
				Zend_Validate_InArray::NOT_IN_ARRAY => "「%value%」は候補の中にありません",
				
				Zend_Validate_Hostname::IP_ADDRESS_NOT_ALLOWED  => "「%value%」は IP アドレスのようですが IP アドレスは許されていません",
				Zend_Validate_Hostname::UNKNOWN_TLD             => "「%value%」は DNS ホスト名のようですが TLD が一覧に見つかりません",
				Zend_Validate_Hostname::INVALID_DASH            => "「%value%」は DNS ホスト名のようですが不適当な位置にダッシュ (-) があります",
				Zend_Validate_Hostname::INVALID_HOSTNAME_SCHEMA => "「%value%」は DNS ホスト名のようですが TLD 「%tld%」のホスト名スキーマに合いません",
				Zend_Validate_Hostname::UNDECIPHERABLE_TLD      => "「%value%」は DNS ホスト名のようですが TLD 部を展開できません",
				Zend_Validate_Hostname::INVALID_HOSTNAME        => "「%value%」は DNS ホスト名の構造に合いません",
				Zend_Validate_Hostname::INVALID_LOCAL_NAME      => "「%value%」は有効なローカルネットワーク名ではないようです",
				Zend_Validate_Hostname::LOCAL_NAME_NOT_ALLOWED  => "「%value%」はローカルネットワーク名のようですがローカルネットワーク名は許されていません",
				
				Zend_Validate_Hex::NOT_HEX => "「%value%」は16進文字列以外を含みます",
				
				Zend_Validate_GreaterThan::NOT_GREATER => "「%value%」は「%min%」より大きくありません",
				
				Zend_Validate_Float::NOT_FLOAT => "「%value%」は数値ではないようです",
				
				Zend_Validate_EmailAddress::INVALID            => "「%value%」はメールアドレスの基本的な形式 local-part@hostname ではありません",
				Zend_Validate_EmailAddress::INVALID_HOSTNAME   => "メールアドレス「%value%」内の「%hostname%」は有効なホスト名ではありません",
				Zend_Validate_EmailAddress::INVALID_MX_RECORD  => "メールアドレス「%value%」内の「%hostname%」は有効な MX レコードではないようです",
				Zend_Validate_EmailAddress::DOT_ATOM           => "メールアドレス「%value%」内の「%localPart%」はドットアトム形式に合いません",
				Zend_Validate_EmailAddress::QUOTED_STRING      => "メールアドレス「%value%」内の「%localPart%」は引用文字列形式に合いません",
				Zend_Validate_EmailAddress::INVALID_LOCAL_PART => "メールアドレス「%value%」内の「%localPart%」は有効なローカルパートではありません",
				
				Zend_Validate_Digits::NOT_DIGITS   => "「%value%」に数字以外の文字が含まれています",
				Zend_Validate_Digits::STRING_EMPTY => "「%value%」は空の文字列です",
				
				Zend_Validate_File_Upload::INI_SIZE       => "ファイル「%value%」がiniで設定されたサイズを超えています",
				Zend_Validate_File_Upload::FORM_SIZE      => "ファイル「%value%」がフォームで設定されたサイズを超えています",
				Zend_Validate_File_Upload::PARTIAL        => "ファイル「%value%」が一部しかアップロードされていません",
				Zend_Validate_File_Upload::NO_FILE        => "ファイル「%value%」がアップロードされていません",
				Zend_Validate_File_Upload::NO_TMP_DIR     => "ファイル「%value%」用の一時ディレクトリーが見つかりません",
				Zend_Validate_File_Upload::CANT_WRITE     => "ファイル「%value%」を書き込みできませんでした",
				Zend_Validate_File_Upload::EXTENSION      => "ファイル「%value%」のアップロード中に拡張がエラーを返しました",
				Zend_Validate_File_Upload::ATTACK         => "ファイル「%value%」のアップロードは不正です。攻撃の可能性もあります",
				Zend_Validate_File_Upload::FILE_NOT_FOUND => "ファイル「%value%」が見つかりません",
				Zend_Validate_File_Upload::UNKNOWN        => "ファイル「%value%」のアップロード中の不明なエラーです",
				
				Zend_Validate_File_Count::TOO_MUCH => "ファイルが多すぎます。最大「%max%」個ですが「%count%」個指定されました",
				Zend_Validate_File_Count::TOO_LESS => "ファイルが少なすぎます。最小「%min%」個ですが「%count%」個しか指定されていません",
				
				Zend_Validate_File_Size::TOO_BIG   => "ファイル「%value%」のサイズ「%size%」が最大サイズ「%max%」を上回っています",
				Zend_Validate_File_Size::TOO_SMALL => "ファイル「%value%」のサイズ「%size%」が最小サイズ「%min%」を下回っています",
				Zend_Validate_File_Size::NOT_FOUND => "ファイル「%value%」が見つかりません",
				
				Zend_Validate_File_Extension::FALSE_EXTENSION => "ファイル「%value%」は許可されていない拡張子を持っています",
				Zend_Validate_File_Extension::NOT_FOUND       => "ファイル「%value%」が見つかりません",

			), 'ja');
	    }
	    return $adapter;
	} // getInstance
}
