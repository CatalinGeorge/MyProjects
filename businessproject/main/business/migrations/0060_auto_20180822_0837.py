# Generated by Django 2.1 on 2018-08-22 08:37

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('business', '0059_auto_20180822_0834'),
    ]

    operations = [
        migrations.AlterField(
            model_name='social',
            name='icon',
            field=models.ImageField(default='noimage.jpg', upload_to='businessicons'),
        ),
    ]
