# Generated by Django 2.1 on 2018-08-24 10:56

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('business', '0069_business_views'),
    ]

    operations = [
        migrations.AlterField(
            model_name='chatreply',
            name='chat',
            field=models.CharField(default='', max_length=50),
        ),
    ]
